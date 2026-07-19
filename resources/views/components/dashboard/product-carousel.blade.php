{{-- Reusable horizontal product carousel with Alpine.js --}}
{{-- Props: $title (string), $products (Collection), $viewAllRoute (string), $badge (string|null) --}}
<section class="py-12 px-4 md:px-8">
    <div class="max-w-[1280px] mx-auto">
        {{-- Section Header --}}
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <h2 class="font-sans text-2xl font-semibold text-[#1a1a2e]">{{ $title }}</h2>
                @if (!empty($badge))
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold capitalize tracking-wider
                               {{ $badge === 'Sale' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' }}">
                        {{ $badge }}
                    </span>
                @endif
            </div>
            <a href="{{ $viewAllRoute }}"
                class="text-blue-600 font-semibold text-sm no-underline hover:text-blue-800 transition-colors">
                View All &rarr;
            </a>
        </div>

        {{-- Carousel Container --}}
        <div x-data="productCarousel"
            @mouseenter="pauseAutoplay()" @mouseleave="resumeAutoplay()"
            class="relative group">

            {{-- Left Arrow --}}
            <button @click="scrollBy(-1)" x-show="canScrollLeft" x-transition
                class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-3 z-10 w-10 h-10 rounded-full bg-white border border-[#e4e4e7] shadow-md flex items-center justify-center text-[#3f3f46] hover:bg-[#f4f4f5] transition-all opacity-0 group-hover:opacity-100">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            {{-- Track --}}
            <div x-ref="track" @scroll.passive="updateButtons()"
                class="flex gap-6 overflow-x-auto overflow-y-visible pt-4 scroll-smooth snap-x snap-mandatory scrollbar-none pb-2"
                style="-ms-overflow-style: none; scrollbar-width: none;">
                <style>
                    [x-ref="track"]::-webkit-scrollbar {
                        display: none;
                    }
                </style>

                @foreach ($products as $product)
                    <x-product-card :product="$product" :isCarouselCard="true" class="flex-shrink-0 w-[280px] sm:w-[300px] snap-start" />
                @endforeach
            </div>

            {{-- Right Arrow --}}
            <button @click="scrollBy(1)" x-show="canScrollRight" x-transition
                class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-3 z-10 w-10 h-10 rounded-full bg-white border border-[#e4e4e7] shadow-md flex items-center justify-center text-[#3f3f46] hover:bg-[#f4f4f5] transition-all opacity-0 group-hover:opacity-100">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</section>
