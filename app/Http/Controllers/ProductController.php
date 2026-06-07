<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with('category', 'voucher')->get();
        $category = Category::all();
        $heroProduct = Product::with('category')->inRandomOrder()->first();
        return view('dashboard', compact('products', 'category', 'heroProduct'));
    }

    public function admin_index()
    {
        $products = Product::with('category', 'voucher')->get();
        $category = Category::all();
        return view('auth.admin.dashboard', compact('products', 'category'));
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

    public function papers_index()
    {
        $products = Product::with('category', 'voucher')->get();
        $category = Category::all();
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
