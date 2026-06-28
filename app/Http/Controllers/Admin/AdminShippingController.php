<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'description'    => ['nullable', 'string'],
            'fee'            => ['required', 'numeric', 'min:0'],
            'estimated_days' => ['required', 'integer', 'min:1'],
            'is_active'      => ['boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        ShippingMethod::create($data);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Shipping method created.');
    }

    public function edit(ShippingMethod $shippingMethod)
    {
        return view('admin.settings.shipping.edit', compact('shippingMethod'));
    }

    public function update(Request $request, ShippingMethod $shippingMethod)
    {
        $data = $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'description'    => ['nullable', 'string'],
            'fee'            => ['required', 'numeric', 'min:0'],
            'estimated_days' => ['required', 'integer', 'min:1'],
            'is_active'      => ['boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active', $shippingMethod->is_active);

        $shippingMethod->update($data);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Shipping method updated.');
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

    /**
     * Toggle is_active via AJAX.
     */
    public function toggle(ShippingMethod $shippingMethod)
    {
        $shippingMethod->update(['is_active' => !$shippingMethod->is_active]);
        return response()->json(['is_active' => $shippingMethod->is_active]);
    }
}
