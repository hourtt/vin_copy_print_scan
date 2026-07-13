<x-admin-layout>
    <x-slot name="header">Product Detail</x-slot>

    <div class="space-y-5">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-500 hover:text-gray-700">← Products</a>
            <span class="text-gray-300">/</span>
            <span class="text-sm text-gray-700 font-medium">{{ $product->name }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Gallery --}}
            <div class="lg:col-span-2 space-y-5">
                @if ($product->images->isNotEmpty())
                    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm"
                         x-data="{ active: '{{ Storage::url($product->images->firstWhere('is_primary', true)?->image_path ?? $product->images->first()->image_path) }}' }">
                        <img :src="active" class="w-full h-72 object-contain bg-gray-50 p-4" loading="lazy">
                        <div class="flex gap-2 p-4 border-t border-gray-100 overflow-x-auto">
                            @foreach ($product->images->sortBy('sort_order') as $image)
                                <button type="button" @click="active='{{ Storage::url($image->image_path) }}'"
                                        :class="active === '{{ Storage::url($image->image_path) }}' ? 'ring-2 ring-indigo-400 border-indigo-300' : 'border-gray-100 hover:border-gray-300'"
                                        class="shrink-0 border rounded-lg overflow-hidden w-14 h-14 transition-all">
                                    <img src="{{ Storage::url($image->image_path) }}" class="w-full h-full object-cover" loading="lazy">
                                </button>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="bg-gray-50 border border-gray-200 rounded-xl h-48 flex items-center justify-center text-gray-300">
                        <svg class="w-12 h-12" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                @endif

                {{-- Description --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <h3 class="text-sm font-semibold text-gray-700 mb-3">Description</h3>
                    <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-wrap">{{ $product->description ?? 'No description provided.' }}</p>
                </div>

                {{-- Specifications --}}
                @if ($product->specifications)
                    <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                        <h3 class="text-sm font-semibold text-gray-700 mb-3">Specifications</h3>
                        <dl class="divide-y divide-gray-100">
                            @foreach ($product->specifications as $key => $val)
                                <div class="flex justify-between py-2 text-sm">
                                    <dt class="text-gray-500 font-medium">{{ $key }}</dt>
                                    <dd class="text-gray-900">{{ $val }}</dd>
                                </div>
                            @endforeach
                        </dl>
                    </div>
                @endif

                {{-- Order History Count --}}
                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm">
                    <h3 class="text-sm font-semibold text-gray-700 mb-2">Sales History</h3>
                    <p class="text-2xl font-bold text-gray-900">{{ $product->orderItems->count() }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">order item records</p>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-5">

                <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-sm space-y-3">
                    <div class="flex items-start justify-between">
                        <div>
                            <h2 class="text-base font-semibold text-gray-900">{{ $product->name }}</h2>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $product->brand?->name ?? 'No brand' }}</p>
                        </div>
                        @if ($product->is_featured)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700">★ Featured</span>
                        @endif
                    </div>

                    <div class="text-2xl font-bold text-indigo-600">${{ number_format($product->price, 2) }}</div>

                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-500">Category</span>
                            <span class="text-gray-900 font-medium">{{ $product->category?->name ?? '—' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Stock</span>
                            <span class="font-medium {{ $product->stock > 5 ? 'text-green-600' : ($product->stock > 0 ? 'text-amber-600' : 'text-red-600') }}">
                                {{ $product->stock }} units
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Status</span>
                            @if ($product->trashed())
                                <span class="text-gray-400">Archived</span>
                            @else
                                <span class="text-green-600">Active</span>
                            @endif
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Slug</span>
                            <span class="text-gray-700 font-mono text-xs">{{ $product->slug }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-500">Created</span>
                            <span class="text-gray-700">{{ $product->created_at->format('d M Y') }}</span>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-3">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="block w-full text-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition-colors">
                            Edit Product
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
