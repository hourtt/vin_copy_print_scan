<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index(Request $request)
    {
        //* Get all orders that belong to the authenticated user and display them. */
        $orders = Order::whereBelongsTo($request->user())->paginate(10);
        return view('orders.index', compact('orders'));
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
     * Display the specified orders.
     */
    public function show(string $id, Request $request)
    {
        //* Find the order that belongs to the authenticated user and display it. If the order does not belong to the user, it will throw a 404 error. */
        $order = Order::query()->whereBelongsTo($request->user())->findOrFail($id);
        return view('orders.show', compact('order'));
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
