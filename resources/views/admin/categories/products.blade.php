<x-admin-layout>
    <x-slot name="header">{{ $category->name }} — Products</x-slot>

    <div class="space-y-5">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.categories.index') }}" class="text-sm text-gray-500 hover:text-gray-700">← Categories</a>
            <span class="text-gray-300">/</span>
            <span class="text-sm text-gray-700 font-medium">{{ $category->name }}</span>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            @if ($products->isEmpty())
                <div class="flex flex-col items-center justify-center py-16 text-gray-400">
                    <p class="text-sm">No products in this category.</p>
                </div>
            @else
                <table class="w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Product</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wide">Brand</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wide">Price</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wide">Stock</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($products as $product)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    <a href="{{ route('admin.products.show', $product) }}" class="hover:text-indigo-600">{{ $product->name }}</a>
                                </td>
                                <td class="px-4 py-3 text-gray-500">{{ $product->brand?->name ?? '—' }}</td>
                                <td class="px-4 py-3 text-right font-medium">${{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if ($product->stock > 5)
                                        <span class="inline-flex px-2 py-0.5 rounded-full text-xs bg-green-50 text-green-700">{{ $product->stock }}</span>
                                    @elseif ($product->stock > 0)
                                        <span class="inline-flex px-2 py-0.5 rounded-full text-xs bg-amber-50 text-amber-700">{{ $product->stock }}</span>
                                    @else
                                        <span class="inline-flex px-2 py-0.5 rounded-full text-xs bg-red-50 text-red-700">Out</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <a href="{{ route('admin.products.edit', $product) }}"
                                       class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-700 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($products->hasPages())
                    <div class="px-4 py-3 border-t border-gray-100">{{ $products->links() }}</div>
                @endif
            @endif
        </div>
    </div>
</x-admin-layout>
