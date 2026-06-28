<x-admin-layout>
    <x-slot name="header">Create Voucher</x-slot>

    <div class="max-w-3xl">
        <form method="POST" action="{{ route('admin.vouchers.store') }}" class="space-y-6"
              x-data="{ scope: '{{ old('scope', 'site_wide') }}' }">
            @csrf

            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            {{-- Basic Settings --}}
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-4">
                <h3 class="text-sm font-semibold text-gray-700 border-b border-gray-100 pb-2">Basic Settings</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Voucher Code <span class="text-red-500">*</span></label>
                        <input type="text" name="code" value="{{ old('code') }}" required
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm font-mono uppercase focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="e.g. SUMMER2024">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="is_active" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="1" @selected(old('is_active') == '1')>Active</option>
                            <option value="0" @selected(old('is_active') == '0')>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Discount Type <span class="text-red-500">*</span></label>
                        <select name="discount_type" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="percentage" @selected(old('discount_type') == 'percentage')>Percentage (%)</option>
                            <option value="fixed" @selected(old('discount_type') == 'fixed')>Fixed Amount ($)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Discount Value <span class="text-red-500">*</span></label>
                        <input type="number" name="discount_value" value="{{ old('discount_value') }}" step="0.01" min="0" required
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="e.g. 15 or 10.00">
                    </div>
                </div>
            </div>

            {{-- Limits & Scope --}}
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-4">
                <h3 class="text-sm font-semibold text-gray-700 border-b border-gray-100 pb-2">Limits & Scope</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Usage Limit</label>
                        <input type="number" name="usage_limit" value="{{ old('usage_limit') }}" min="1"
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="e.g. 100 (Leave empty for unlimited)">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Expiry Date</label>
                        <input type="datetime-local" name="expires_at" value="{{ old('expires_at') }}"
                               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Apply To</label>
                    <select name="scope" x-model="scope" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="site_wide">Site-wide (All products)</option>
                        <option value="categories">Specific Categories</option>
                        <option value="products">Specific Products</option>
                    </select>
                </div>

                {{-- Dynamic Scope Selection --}}
                <div x-show="scope === 'categories'" x-cloak class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Categories <span class="text-red-500">*</span></label>
                    <div class="max-h-48 overflow-y-auto space-y-2">
                        @foreach ($categories as $cat)
                            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                                <input type="checkbox" name="category_ids[]" value="{{ $cat->id }}" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                    @checked(is_array(old('category_ids')) && in_array($cat->id, old('category_ids')))>
                                {{ $cat->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

                <div x-show="scope === 'products'" x-cloak class="p-4 bg-gray-50 border border-gray-200 rounded-lg">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Select Products <span class="text-red-500">*</span></label>
                    <div class="max-h-48 overflow-y-auto space-y-2">
                        @foreach ($products as $prod)
                            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                                <input type="checkbox" name="product_ids[]" value="{{ $prod->id }}" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                                    @checked(is_array(old('product_ids')) && in_array($prod->id, old('product_ids')))>
                                {{ $prod->name }}
                            </label>
                        @endforeach
                    </div>
                </div>

            </div>

            <div class="flex gap-2">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                    Create Voucher
                </button>
                <a href="{{ route('admin.vouchers.index') }}" class="px-6 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
