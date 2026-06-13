@php
    $stock = (int) $product->stock;
    $stockClass = $stock <= 0 ? 'bg-red-50 text-red-600 border border-red-200' : ($stock <= 5 ? 'bg-amber-50 text-amber-600 border border-amber-200' : 'bg-emerald-50 text-emerald-600 border border-emerald-200');
    $stockLabel = $stock <= 0 ? 'Out of stock' : ($stock <= 5 ? "Low Stock" : 'In stock');
@endphp

<article class="bg-white border border-[#dee2e6] rounded-xl overflow-hidden flex flex-col h-full hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:-translate-y-1 transition-all duration-300">
    <div class="relative bg-[#f8f9fa] aspect-[4/3] flex items-center justify-center p-4">
        <span class="absolute top-3 left-3 text-[0.7rem] font-bold px-2.5 py-1 rounded-md shadow-sm {{ $stockClass }}">{{ $stockLabel }}</span>
        @if ($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy" class="max-w-full max-h-full object-contain mix-blend-multiply">
        @else
            <span class="text-[#6c757d]">No image</span>
        @endif
    </div>

    <div class="p-5 flex flex-col flex-1">
        <div class="text-xs text-[#6c757d] mb-1.5 font-semibold uppercase tracking-wider">{{ $product->category->name ?? 'Category' }}</div>
        <h3 class="text-base font-bold text-[#212529] m-0 mb-3 leading-snug">{{ $product->name }}</h3>
        
        <div class="text-xl font-bold text-[#212529] mb-6 mt-auto">${{ number_format($product->price, 2) }}</div>
        
        @auth
            <button class="w-full min-h-[44px] px-4 bg-[#0056b3] text-white border-none rounded-lg text-sm font-semibold flex items-center justify-center gap-2 cursor-pointer transition-colors hover:bg-[#003f87] disabled:bg-[#dee2e6] disabled:text-[#6c757d] disabled:cursor-not-allowed" @if ($stock <= 0) disabled @endif>
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 20a1 1 0 100-2 1 1 0 000 2zM20 20a1 1 0 100-2 1 1 0 000 2z"></path>
                    <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"></path>
                </svg>
                {{ $stock <= 0 ? 'Out of Stock' : 'Add to Cart' }}
            </button>
        @else
            <a href="{{ route('login') }}" class="w-full min-h-[44px] px-4 bg-[#dee2e6]/50 text-[#212529] border border-[#dee2e6] rounded-lg text-sm font-semibold flex items-center justify-center transition-colors hover:bg-[#dee2e6]">
                Sign In to Buy
            </a>
        @endauth
    </div>
</article>
