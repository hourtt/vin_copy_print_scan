<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products with optional filters.
     *
     * Query params:
     *   category_id  – filter by category primary key
     *   category     – filter by category slug (alternative to category_id)
     *   brand_id     – filter by brand primary key
     *   search       – partial name match
     *   sort         – price-asc | price-desc | newest | name-asc (default: newest)
     *   per_page     – items per page, 1–50 (default: 20)
     */
    public function index(Request $request)
    {
        $query = Product::with('category', 'brand');

        // Filter by category_id
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter by category slug
        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        // Filter by brand
        if ($request->filled('brand_id')) {
            $query->where('brand_id', $request->brand_id);
        }

        // Name search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sorting
        switch ($request->get('sort', 'newest')) {
            case 'price-asc':  $query->orderBy('price', 'asc');        break;
            case 'price-desc': $query->orderBy('price', 'desc');       break;
            case 'name-asc':   $query->orderBy('name', 'asc');         break;
            default:           $query->orderBy('created_at', 'desc');  break;
        }

        // Pagination cap at 50 to prevent abuse
        $perPage = min((int) $request->get('per_page', 20), 50);
        $products = $query->paginate($perPage)->withQueryString();

        return ProductResource::collection($products);
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
