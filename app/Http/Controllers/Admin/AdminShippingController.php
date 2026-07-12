<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SaveShippingMethodRequest;

class AdminShippingController extends Controller
{
    /**
     * Redirect index to settings page (shipping managed within settings).
     */
    public function index()
    {
        return redirect()->route('admin.settings.index');
    }

    public function create()
    {
        return view('admin.settings.shipping.create');
    }

    public function store(SaveShippingMethodRequest $request)
    {
        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active', true);

        ShippingMethod::create($data);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Shipping method created.');
    }

    public function edit(ShippingMethod $shippingMethod)
    {
        return view('admin.settings.shipping.edit', compact('shippingMethod'));
    }

    public function update(SaveShippingMethodRequest $request, ShippingMethod $shippingMethod)
    {
        $data = $request->validated();

        $data['is_active'] = $request->boolean('is_active', $shippingMethod->is_active);

        $shippingMethod->update($data);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Shipping method updated.');
    }

    public function toggle(ShippingMethod $shippingMethod)
    {
        $shippingMethod->update(['is_active' => !$shippingMethod->is_active]);
        return response()->json(['is_active' => $shippingMethod->is_active]);
    }
    /**
     * Soft-delete — preserves historical order data.
     */
    public function destroy(ShippingMethod $shippingMethod)
    {
        $shippingMethod->delete(); // SoftDeletes

        return redirect()->route('admin.settings.index')
            ->with('success', "Shipping method \"{$shippingMethod->name}\" removed.");
    }
}
