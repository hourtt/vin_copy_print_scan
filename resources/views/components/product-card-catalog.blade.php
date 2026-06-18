@php
    $stock = (int) $product->stock;
    $stockClass = $stock <= 0 ? 'bg-red-50 text-red-600 border border-red-200' : ($stock <= 5 ? 'bg-amber-50 text-amber-600 border border-amber-200' : 'bg-emerald-50 text-emerald-600 border border-emerald-200');
    $stockLabel = $stock <= 0 ? 'OUT OF STOCK' : ($stock <= 5 ? "LOW STOCK" : 'IN STOCK');
@endphp

<article class="bg-white border border-gray-100 rounded-lg overflow-hidden flex flex-col h-full hover:shadow-md transition-all duration-300">
    <div class="relative bg-[#f8f9fa] aspect-[4/3] flex items-center justify-center p-3 sm:p-4">
        <span class="absolute top-2 left-2 sm:top-3 sm:left-3 text-[10px] font-bold px-2 py-1 rounded shadow-sm {{ $stockClass }}">{{ $stockLabel }}</span>
        @if ($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy" class="max-w-full max-h-full object-contain mix-blend-multiply">
        @else
            <span class="text-[#6c757d] text-xs uppercase">No image</span>
        @endif
    </div>

    <div class="p-3 sm:p-4 flex flex-col flex-1">
        <div class="text-[10px] text-gray-500 mb-1 font-semibold uppercase tracking-wider">{{ $product->category->name ?? 'Category' }}</div>
        <h3 class="text-sm font-bold text-gray-900 m-0 mb-3 leading-snug line-clamp-2">{{ $product->name }}</h3>
        
        <div class="mt-auto">
            <div class="text-base font-bold text-gray-900 mb-3">${{ number_format($product->price, 2) }}</div>
            
            @auth
                <button class="w-full min-h-[40px] px-3 bg-gray-900 text-white border-none rounded-lg text-xs font-semibold flex items-center justify-center gap-2 cursor-pointer transition-colors hover:bg-black disabled:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed" @if ($stock <= 0) disabled @endif>
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 20a1 1 0 100-2 1 1 0 000 2zM20 20a1 1 0 100-2 1 1 0 000 2z"></path>
                        <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
                    </svg>
                    {{ $stock <= 0 ? 'Out of Stock' : 'Add to Cart' }}
                </button>
            @else
                <a href="{{ route('login') }}" class="w-full min-h-[40px] px-3 bg-white text-gray-700 border border-gray-200 rounded-lg text-xs font-semibold flex items-center justify-center transition-colors hover:bg-gray-50">
                    Sign In
                </a>
            @endauth
        </div>
    </div>
</article>
