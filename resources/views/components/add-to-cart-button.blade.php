@props(['product', 'isAvailable' => false])

<div x-data="addToCart('{{ route('cart.add', $product->id) }}', {{ $isAvailable ? 'true' : 'false' }})">
    <button @click="add()"
        title="{{ $isAvailable ? 'Add to Cart' : 'Unavailable' }}"
        class="inline-flex items-center justify-center w-10 h-10 bg-[#3f3f46] text-white rounded-lg hover:bg-[#18181b] active:scale-95 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-[#3f3f46]/50"
        :disabled="adding || !isAvailable">
        
        <!-- Cart Icon -->
        <span x-show="!adding && !added" class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-white">
                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
        </span>

        <!-- Loading Spinner -->
        <span x-show="adding" x-cloak class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="animate-spin w-5 h-5 text-white">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>

        <!-- Checkmark -->
        <span x-show="added" x-cloak class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-green-400">
                <path d="M5 13l4 4L19 7" />
            </svg>
        </span>
    </button>
</div>
