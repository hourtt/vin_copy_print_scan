@foreach ($products->groupBy('category_id') as $catId => $grouped)
    @php $catName = $grouped->first()->category->name ?? 'Uncategorized'; @endphp

    <section class="category-section mb-12" data-cat="{{ $catId }}">
        {{-- Category Heading --}}
        <div class="flex items-center gap-4 mb-6">
            <h2 class="font-['Fraunces',serif] text-2xl font-semibold text-[#27272a] whitespace-nowrap">
                {{ $catName }}
            </h2>
            <div class="flex-1 h-px bg-[#e4e4e7]"></div>
        </div>

        {{-- Product Grid --}}
        <div class="product-grid grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 sm:gap-5"
            id="grid-{{ $catId }}">
            @foreach ($grouped as $product)
                @php
                    $stock = (int) $product->stock;
                    $stockClass = $stock <= 0 ? 'out-stock' : ($stock <= 5 ? 'low-stock' : 'in-stock');
                    $stockLabel =
                        $stock <= 0 ? 'Out of stock' : ($stock <= 5 ? "Only {$stock} left" : 'In stock');

                    $badgeBg = match($stockClass) {
                        'in-stock'  => 'bg-green-100 text-green-800',
                        'low-stock' => 'bg-yellow-100 text-yellow-800',
                        default     => 'bg-red-100 text-red-800',
                    };
                @endphp

                <article
                    class="product-card group bg-white border border-[#e4e4e7] rounded-xl sm:rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-1 hover:shadow-md transition-all duration-300 ease-in-out"
                    data-cat="{{ $product->category_id }}"
                    data-brand="{{ $product->brand_id ?? '' }}"
                    data-name="{{ strtolower($product->name) }}"
                    data-price="{{ $product->price }}">

                    {{-- Image --}}
                    <div class="relative aspect-[3/2] sm:aspect-[4/3] bg-white flex items-center justify-center overflow-hidden border-b border-[#e4e4e7]">
                        @if ($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                loading="lazy"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        @else
                            <span class="text-sm text-[#71717a]">No image</span>
                        @endif

                        {{-- Stock badge --}}
                        <span class="absolute top-2 right-2 text-[0.6rem] sm:text-[0.7rem] font-bold uppercase tracking-wide px-1.5 py-0.5 rounded-md {{ $badgeBg }}">
                            {{ $stockLabel }}
                        </span>
                    </div>

                    {{-- Card Body --}}
                    <div class="flex flex-col flex-1 p-3 sm:p-5 gap-1.5 sm:gap-2">
                        <div class="text-[10px] sm:text-xs font-bold uppercase tracking-wide text-[#3f3f46]">
                            {{ $product->category->name ?? 'Toner' }}
                        </div>
                        <div class="font-['Fraunces',serif] text-sm sm:text-lg font-semibold text-[#27272a] leading-tight line-clamp-2" title="{{ $product->name }}">
                            {{ $product->name }}
                        </div>

                        @if ($product->compatibility)
                            <div class="hidden sm:block text-xs sm:text-sm text-[#71717a] line-clamp-1">Fits: {{ $product->compatibility }}</div>
                        @endif

                        {{-- Footer --}}
                        <div class="flex flex-col mt-auto pt-3 border-t border-[#e4e4e7] gap-2.5 sm:flex-row sm:items-center sm:justify-between sm:pt-4 sm:gap-0">
                            <span class="text-base sm:text-xl font-bold text-[#27272a]">
                                ${{ number_format($product->price, 2) }}
                            </span>

                            @auth
                                <button
                                    class="w-full sm:w-auto inline-flex items-center justify-center min-h-[44px] sm:min-h-[36px] px-3 py-2 bg-[#3f3f46] text-white text-xs sm:text-sm font-semibold rounded-lg hover:bg-[#18181b] active:scale-95 transition-all duration-200 disabled:opacity-50 disabled:cursor-not-allowed"
                                    @if ($stock <= 0) disabled @endif>
                                    {{ $stock <= 0 ? 'Unavailable' : 'Add to Cart' }}
                                </button>
                            @else
                                <a href="{{ route('login') }}"
                                    class="w-full sm:w-auto inline-flex items-center justify-center min-h-[44px] sm:min-h-[36px] px-3 py-2 border border-[#e4e4e7] bg-[#faf9f6] text-[#27272a] text-xs sm:text-sm font-semibold rounded-lg hover:border-[#3f3f46] hover:text-[#3f3f46] transition-all duration-200">
                                    Sign In
                                </a>
                            @endauth
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endforeach
