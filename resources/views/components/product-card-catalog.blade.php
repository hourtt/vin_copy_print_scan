@props(['product'])

@php
    $stock = $product->stock_status;
@endphp

<article
    class="group relative flex flex-col h-full bg-white rounded-xl shadow-sm hover:shadow-lg transition-all duration-300 ease-in-out p-3">

    <!-- Simplified Image Container -->
    <div
        class="relative w-full aspect-[4/3] bg-slate-50 rounded-lg overflow-hidden flex items-center justify-center mb-4">
        <!-- Stock Badge -->
        <span class="absolute top-2 left-2 text-[10px] font-bold px-2 py-1 rounded-md z-10 {{ $stock['badgeBg'] ?? 'bg-gray-100 text-gray-800' }}">
            {{ $stock['label'] ?? 'In Stock' }}
        </span>

        @if ($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy"
                class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500">
        @else
            <span class="text-slate-400 text-xs font-medium uppercase tracking-wider">No Image</span>
        @endif
    </div>

    <!-- Card Body -->
    <div class="flex flex-col flex-1">
        <span class="text-[11px] font-semibold text-blue-600 uppercase tracking-wider mb-1">
            {{ $product->category->name ?? 'Category' }}
        </span>
        <h3 class="text-sm font-medium text-slate-900 leading-tight mb-3 line-clamp-2">
            {{ $product->name }}
        </h3>

        <div class="mt-auto flex items-end justify-between">
            <span class="text-lg font-bold text-slate-900">
                ${{ number_format($product->price, 2) }}
            </span>
            
            @auth
                <x-add-to-cart-button :product="$product" :isAvailable="$stock['isAvailable'] ?? true" />
            @else
                <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center min-h-[36px] px-3 py-1.5 border border-[#e4e4e7] bg-[#ffffff] text-[#27272a] text-xs font-semibold rounded-lg hover:border-[#3f3f46] hover:text-[#3f3f46] transition-all duration-200">
                    Sign In
                </a>
            @endauth
        </div>
    </div>
</article>
