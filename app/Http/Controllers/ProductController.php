<?php

namespace App\Http\Controllers;

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
        if ($previous == 0 && $current > 0) return 100;
        if ($previous == 0 && $current == 0) return 0;
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

        return view('auth.admin.dashboard', compact(
            'products', 'category', 'totalRevenue', 'totalOrders', 'activeCustomers', 'activeIssues',
            'revenueGrowth', 'orderGrowth', 'customerGrowth', 'issueGrowth'
        ));
    }

    public function printers_index()
    {
        $products = Product::with('category', 'voucher')->get();
        $category = Category::all();
        return view('collections.printers.index', compact('products', 'category'));
    }

    public function toners_index()
    {
        $products = Product::with('category', 'voucher')->get();
        $category = Category::all();
        return view('collections.toners.index', compact('products', 'category'));
    }

    public function inks_index()
    {
        $products = Product::with('category', 'brand', 'voucher')
            ->whereHas('category', fn($q) => $q->where('slug', 'ink-cartridges'))
            ->get();
        $category = Category::orderBy('sort_order')->get();
        return view('collections.inks.index', compact('products', 'category'));
    }

    public function papers_index()
    {
        $products = Product::with('category', 'brand', 'voucher')
            ->whereHas('category', fn($q) => $q->where('slug', 'paper'))
            ->get();
        $category = Category::orderBy('sort_order')->get();
        return view('collections.papers.index', compact('products', 'category'));
    }

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
