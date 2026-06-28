<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopSetting;
use App\Models\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminSettingsController extends Controller
{
    public function index()
    {
        $admin           = Auth::user();
        $shopSettings    = ShopSetting::pluck('value', 'key');
        $shippingMethods = ShippingMethod::orderBy('name')->get();

        return view('admin.settings.index', compact('admin', 'shopSettings', 'shippingMethods'));
    }

    public function updateShop(Request $request)
    {
        $data = $request->validate([
            'shop_name'        => ['required', 'string', 'max:255'],
            'shop_address'     => ['nullable', 'string', 'max:500'],
            'shop_phone'       => ['nullable', 'string', 'max:50'],
            'shop_email'       => ['nullable', 'email', 'max:255'],
            'shop_description' => ['nullable', 'string'],
            'shop_logo'        => ['nullable', 'image', 'max:2048'],
        ]);

        // Handle logo upload
        if ($request->hasFile('shop_logo')) {
            $oldLogo = ShopSetting::get('shop_logo');
            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
            $data['shop_logo'] = $request->file('shop_logo')->store('shop', 'public');
        }

        foreach ($data as $key => $value) {
            ShopSetting::set($key, $value, 'general');
        }

        return back()->with('success', 'Shop information updated.');
    }

    public function updateAdmin(Request $request)
    {
        $admin = Auth::user();

        $data = $request->validate([
            'first_name'   => ['required', 'string', 'max:100'],
            'last_name'    => ['required', 'string', 'max:100'],
            'email'        => ['required', 'email', Rule::unique('users', 'email')->ignore($admin->id)],
            'phone_number' => ['nullable', 'string', 'max:30'],
            'address'      => ['nullable', 'string', 'max:255'],
        ]);

        $admin->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $admin = Auth::user();

        $request->validate([
            'current_password'      => ['required', 'string'],
            'password'              => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
        ]);

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $admin->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password changed successfully.');
    }
}
