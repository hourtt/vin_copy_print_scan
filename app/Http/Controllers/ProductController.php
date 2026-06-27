<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'brand', 'voucher')->latest()->get();
        $category = Category::orderBy('sort_order')->get();
        $featured = Product::with('category', 'brand')
            ->where('is_featured', true)
            ->inStock()
            ->latest()
            ->take(8)
            ->get();
        return view('dashboard', compact('products', 'category', 'featured'));
    }

    public function product_catalog_index(Request $request)
    {
        $query = Product::with('category');

        // Apply Category Filters
        if ($request->has('categories') && !empty($request->categories)) {
            $query->whereIn('category_id', $request->categories);
        }

        // Apply Price Filters
        if ($request->has('min_price') && is_numeric($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && is_numeric($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }

        // Apply Sort
        $sort = $request->get('sort', 'recommended');
        switch ($sort) {
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'recommended':
            default:
                // If there's a recommended column, use it. Otherwise fallback to id/created_at
                $query->orderBy('id', 'desc');
                break;
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('products-catalog.index', compact('products', 'categories'));
    }

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous == 0 && $current > 0)
            return 100;
        if ($previous == 0 && $current == 0)
            return 0;
        return (($current - $previous) / $previous) * 100;
    }

    public function admin_index()
    {
        $products = Product::with('category', 'voucher')->get();
        $category = Category::all();

        $now = Carbon::now();

        $currentMonthStart = $now->copy()->startOfMonth();
        $currentMonthEnd = $now->copy()->endOfMonth();
        $previousMonthStart = $now->copy()->subMonth()->startOfMonth();
        $previousMonthEnd = $now->copy()->subMonth()->endOfMonth();

        $currentHourStart = $now->copy()->startOfHour();
        $currentHourEnd = $now->copy()->endOfHour();
        $previousHourStart = $now->copy()->subHour()->startOfHour();
        $previousHourEnd = $now->copy()->subHour()->endOfHour();

        $totalRevenue = Order::where('status', 'delivered')->sum('total') ?? 0;
        $currentRevenue = Order::where('status', 'delivered')->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->sum('total') ?? 0;
        $previousRevenue = Order::where('status', 'delivered')->whereBetween('created_at', [$previousMonthStart, $previousMonthEnd])->sum('total') ?? 0;
        $revenueGrowth = $this->calculatePercentageChange($currentRevenue, $previousRevenue);

        $totalOrders = Order::count() ?? 0;
        $currentOrders = Order::whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
        $previousOrders = Order::whereBetween('created_at', [$previousMonthStart, $previousMonthEnd])->count();
        $orderGrowth = $this->calculatePercentageChange($currentOrders, $previousOrders);

        $activeCustomers = User::where('role', 'user')->count() ?? 0;
        $currentCustomers = User::where('role', 'user')->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])->count();
        $previousCustomers = User::where('role', 'user')->whereBetween('created_at', [$previousMonthStart, $previousMonthEnd])->count();
        $customerGrowth = $this->calculatePercentageChange($currentCustomers, $previousCustomers);

        $activeIssues = 0;
        $issueGrowth = $this->calculatePercentageChange(0, 0);

        return view('components.auth.admin.dashboard', compact(
            'products',
            'category',
            'totalRevenue',
            'totalOrders',
            'activeCustomers',
            'activeIssues',
            'revenueGrowth',
            'orderGrowth',
            'customerGrowth',
            'issueGrowth'
        ));
    }

    public function printers_index(Request $request)
    {
        // Strict category isolation — only Printers (category_id = 1)
        $query = Product::with('category', 'brand', 'voucher')
            ->where('category_id', 1);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Pills are brand pills — filter by brand_id within this category
        if ($request->filled('cat') && $request->cat !== 'all') {
            $query->where('brand_id', $request->cat);
        }

        $sort = $request->get('sort', 'default');
        switch ($sort) {
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'year-desc':
                $query->orderBy('created_at', 'desc');
                break;
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            case 'stock-desc':
                $query->orderBy('stock', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->get();

        // Only brands that have products in the Printers category
        $brands = Brand::whereHas(
            'products',
            fn($q) =>
            $q->where('category_id', 1)
        )->orderBy('name')->get();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'html' => view('components.collections._grid', [
                    'products' => $products,
                    'groupBy' => 'brand_id',
                    'headingRelation' => 'brand',
                    'headingFallback' => 'Other',
                    'subLabelRelation' => 'brand',
                    'subLabelFallback' => 'Printer',
                    'compatKey' => 'compatibility',
                    'emptyMessage' => 'No printers found.',
                    'badgeCase' => 'uppercase',
                ])->render(),
                'count' => $products->count(),
            ]);
        }

        return view('collections.printers.index', compact('products', 'brands'));
    }

    public function toners_index(Request $request)
    {
        // Strict category isolation — only Toners (category_id = 2)
        $query = Product::with('category', 'brand', 'voucher')
            ->where('category_id', 2);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Pills are brand pills — filter by brand_id within this category
        if ($request->filled('cat') && $request->cat !== 'all') {
            $query->where('brand_id', $request->cat);
        }

        $sort = $request->get('sort', 'default');
        switch ($sort) {
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->get();

        // Only brands that have products in the Toners category
        $brands = Brand::whereHas(
            'products',
            fn($q) =>
            $q->where('category_id', 2)
        )->orderBy('name')->get();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'html' => view('components.collections._grid', [
                    'products' => $products,
                    'groupBy' => 'brand_id',
                    'headingRelation' => 'brand',
                    'headingFallback' => 'Other',
                    'subLabelRelation' => 'brand',
                    'subLabelFallback' => 'Toner',
                    'compatKey' => 'compatibility',
                    'emptyMessage' => 'No toners found.',
                    'badgeCase' => 'uppercase',
                ])->render(),
                'count' => $products->count(),
            ]);
        }

        return view('collections.toners.index', compact('products', 'brands'));
    }

    public function inks_index(Request $request)
    {
        $query = Product::with('category', 'brand', 'voucher')
            ->whereHas('category', fn($q) => $q->where('slug', 'ink-cartridges'));

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Pills filter by brand_id
        if ($request->filled('cat') && $request->cat !== 'all') {
            $query->where('brand_id', $request->cat);
        }

        $sort = $request->get('sort', 'default');
        switch ($sort) {
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->get();

        // Brands that have ink-cartridge products
        $brands = Brand::whereHas(
            'products',
            fn($q) =>
            $q->whereHas('category', fn($q2) => $q2->where('slug', 'ink-cartridges'))
        )->orderBy('name')->get();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'html' => view('components.collections._grid', [
                    'products' => $products,
                    'groupBy' => 'brand_id',
                    'headingRelation' => 'brand',
                    'headingFallback' => 'Other',
                    'subLabelRelation' => 'brand',
                    'subLabelFallback' => 'Ink',
                    'compatKey' => 'spec:Compatible Printers',
                    'emptyMessage' => 'No ink cartridges found.',
                    'badgeCase' => 'capitalize',
                ])->render(),
                'count' => $products->count(),
            ]);
        }

        return view('collections.inks.index', compact('products', 'brands'));
    }

    public function papers_index(Request $request)
    {
        $query = Product::with('category', 'brand', 'voucher')
            ->whereHas('category', fn($q) => $q->where('slug', 'paper'));

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Pills are now brand pills — filter by brand_id
        if ($request->filled('cat') && $request->cat !== 'all') {
            $query->where('brand_id', $request->cat);
        }

        $sort = $request->get('sort', 'default');
        switch ($sort) {
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            case 'stock-desc':
                $query->orderBy('stock', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $products = $query->get();

        // Brands that have paper products
        $brands = Brand::whereHas(
            'products',
            fn($q) =>
            $q->whereHas('category', fn($q2) => $q2->where('slug', 'paper'))
        )->orderBy('name')->get();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'html' => view('components.collections._grid', [
                    'products' => $products,
                    'groupBy' => 'category_id',
                    'headingRelation' => 'category',
                    'headingFallback' => 'Uncategorized',
                    'subLabelRelation' => 'category',
                    'subLabelFallback' => 'Paper',
                    'compatKey' => 'compatibility',
                    'emptyMessage' => 'No paper products found.',
                    'badgeCase' => 'uppercase',
                ])->render(),
                'count' => $products->count(),
            ]);
        }

        return view('collections.papers.index', compact('products', 'brands'));
    }
    // * For Admin Role
    /**
     * Show the form for creating a new resource. 
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
