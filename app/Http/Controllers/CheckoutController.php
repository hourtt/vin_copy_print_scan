<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page.
     */
    public function index()
    {
        return view('checkout.index');
    }

    /**
     * Handle the checkout submission.
     */
    public function store(Request $request)
    {
        // Validation could be added here later
        // $request->validate([
        //     'delivery_method' => 'required|in:pickup,delivery',
        //     ...
        // ]);

        // Process order...
        
        // Redirect to success page
        return redirect()->route('checkout.success')->with('success', 'Order placed successfully.');
    }

    /**
     * Display the success page.
     */
    public function success()
    {
        return view('checkout.success');
    }
}
