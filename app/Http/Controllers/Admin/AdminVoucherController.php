<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreVoucherRequest;
use App\Http\Requests\Admin\UpdateVoucherRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Support\Str;

class AdminVoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::withCount('products')
            ->with('categories')
            ->latest()
            ->paginate(15);

        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $products   = Product::orderBy('name')->get(['id', 'name', 'category_id']);
        return view('admin.vouchers.create', compact('categories', 'products'));
    }

    public function store(StoreVoucherRequest $request)
    {
        $data = $request->validated();

        $voucher = Voucher::create([
            'code'           => strtoupper($data['code']),
            'scope'          => $data['scope'],
            'discount_type'  => $data['discount_type'],
            'discount_value' => $data['discount_value'],
            'usage_limit'    => $data['usage_limit'] ?? null,
            'expires_at'     => $data['expires_at'] ?? null,
            'is_active'      => $request->boolean('is_active', true),
            'used_count'     => 0,
        ]);

        // Sync product/category associations based on scope
        if ($data['scope'] === 'products') {
            $voucher->products()->sync($data['product_ids'] ?? []);
        } elseif ($data['scope'] === 'categories') {
            $voucher->categories()->sync($data['category_ids'] ?? []);
        }

        return redirect()->route('admin.vouchers.index')
            ->with('success', "Voucher \"{$voucher->code}\" created successfully.");
    }

    public function edit(Voucher $voucher)
    {
        $voucher->load('products', 'categories');
        $categories = Category::orderBy('name')->get();
        $products   = Product::orderBy('name')->get(['id', 'name', 'category_id']);

        $selectedProductIds  = $voucher->products->pluck('id')->toArray();
        $selectedCategoryIds = $voucher->categories->pluck('id')->toArray();

        return view('admin.vouchers.edit', compact(
            'voucher', 'categories', 'products', 'selectedProductIds', 'selectedCategoryIds'
        ));
    }

    public function update(UpdateVoucherRequest $request, Voucher $voucher)
    {
        $data = $request->validated();

        $voucher->update([
            'code'           => strtoupper($data['code']),
            'scope'          => $data['scope'],
            'discount_type'  => $data['discount_type'],
            'discount_value' => $data['discount_value'],
            'usage_limit'    => $data['usage_limit'] ?? null,
            'expires_at'     => $data['expires_at'] ?? null,
            'is_active'      => $request->boolean('is_active', true),
        ]);

        // Re-sync associations
        if ($data['scope'] === 'products') {
            $voucher->products()->sync($data['product_ids'] ?? []);
            $voucher->categories()->detach();
        } elseif ($data['scope'] === 'categories') {
            $voucher->categories()->sync($data['category_ids'] ?? []);
            $voucher->products()->detach();
        } else {
            // site_wide — clear both
            $voucher->products()->detach();
            $voucher->categories()->detach();
        }

        return redirect()->route('admin.vouchers.index')
            ->with('success', "Voucher \"{$voucher->code}\" updated.");
    }

    public function destroy(Voucher $voucher)
    {
        $code = $voucher->code;
        $voucher->delete(); // order_vouchers cascade, voucher_products cascade

        return redirect()->route('admin.vouchers.index')
            ->with('success', "Voucher \"{$code}\" deleted.");
    }

    /**
     * Toggle is_active — returns JSON for Alpine.js inline toggle.
     */
    public function toggle(Voucher $voucher)
    {
        $voucher->update(['is_active' => !$voucher->is_active]);
        return response()->json([
            'is_active' => $voucher->is_active,
            'message'   => $voucher->is_active ? 'Voucher activated.' : 'Voucher deactivated.',
        ]);
    }

    /**
     * Generate a random uppercase voucher code.
     */
    public static function generateCode(int $length = 10): string
    {
        return strtoupper(Str::random($length));
    }
}
