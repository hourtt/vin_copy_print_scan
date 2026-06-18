<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ink Cartridges - {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600|dm-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/category-filter.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>

<body class="font-sans antialiased bg-white text-[#27272a] overflow-x-hidden">
    @include('layouts.navigation')

    {{-- Hero --}}
    <div class="pt-24 pb-12 px-8 text-center bg-transparent">
        <h1 class="font-khmer text-5xl font-medium text-[#27272a] tracking-tight leading-tight">
            ទឹកថ្នាំ (Ink Cartridges)
        </h1>
        <p class="mt-4 text-[#71717a] text-lg max-w-[500px] mx-auto">
            ទឹកថ្នាំគ្រប់ប្រភេទ ធានាតម្លៃ និងគុណភាព សម្រាប់ម៉ាស៊ីនរបស់លោកអ្នក
    </div>

    {{-- Controls bar --}}
    <div class="sticky top-0 z-30 flex flex-wrap items-center justify-between gap-6 px-6 py-4 bg-white border border-[#e4e4e7] rounded-2xl shadow-sm max-w-[1320px] mx-auto mb-8">

        {{-- Search --}}
        <div class="relative flex-1 min-w-[250px]">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-[18px] h-[18px] text-[#71717a] pointer-events-none"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
            </svg>
            <input type="search" id="toner-search" placeholder="Search ink cartridges..." aria-label="Search ink cartridges"
                class="w-full pl-11 pr-4 py-3 border border-[#e4e4e7] rounded-lg text-sm bg-white text-[#27272a] placeholder-[#71717a] focus:outline-none focus:border-[#3f3f46] focus:ring-2 focus:ring-[#3f3f46]/10 transition-all">
        </div>

        {{-- Brand Pills --}}
        <div class="flex flex-wrap gap-2 pb-1" id="cat-pills">
            <button class="pill active px-4 py-2 rounded-full border border-transparent bg-[#27272a] text-white text-sm font-medium transition-all duration-200 cursor-pointer"
                data-cat="all">All</button>
            @foreach ($category as $cat)
                <button class="pill px-4 py-2 rounded-full border border-[#e4e4e7] bg-white text-[#71717a] text-sm font-medium transition-all duration-200 cursor-pointer hover:border-[#3f3f46] hover:text-[#3f3f46]"
                    data-cat="{{ $cat->id }}">{{ $cat->name }}</button>
            @endforeach
        </div>

        {{-- Sort --}}
        <select id="sort-select" aria-label="Sort ink cartridges"
            class="py-[0.65rem] pl-4 pr-9 border border-[#e4e4e7] rounded-lg text-sm text-[#27272a] bg-white cursor-pointer focus:outline-none focus:border-[#3f3f46] transition-colors appearance-none"
            style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"%235f5e5a\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M6 9l6 6 6-6\"/></svg>'); background-repeat: no-repeat; background-position: right 0.8rem center; background-size: 14px;">
            <option value="default">Sort: Default</option>
            <option value="price-asc">Price: Low - High</option>
            <option value="price-desc">Price: High - Low</option>
            <option value="name-asc">Name: A - Z</option>
        </select>
    </div>

    {{-- Main content --}}
    <main class="max-w-[1280px] mx-auto px-6 pb-16">

        <p class="text-sm text-[#71717a] mb-6" id="results-count">
            Showing <strong id="count-num">{{ $products->count() }}</strong> items
        </p>

        {{-- Product Groups --}}
        <div id="product-groups">
            @forelse ($products->groupBy('brand_id') as $brandId => $grouped)
                @php $brandName = $grouped->first()->brand->name ?? 'Other'; @endphp

                <section class="category-section mb-12" data-cat="{{ $brandId }}">

                    {{-- Brand Heading --}}
                    <div class="flex items-center gap-4 mb-6">
                        <h2 class="font-['Fraunces',serif] text-2xl font-semibold text-[#27272a] whitespace-nowrap">
                            {{ $brandName }}
                        </h2>
                        <div class="flex-1 h-px bg-[#e4e4e7]"></div>
                    </div>

                    {{-- Product Grid --}}
                    <div class="product-grid grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 sm:gap-5"
                        id="grid-{{ $brandId }}">
                        @foreach ($grouped as $product)
                            @php
                                $stock = (int) $product->stock;
                                $stockClass = $stock <= 0 ? 'out-stock' : ($stock <= 5 ? 'low-stock' : 'in-stock');
                                $stockLabel = $stock <= 0 ? 'Out of stock' : ($stock <= 5 ? "Only {$stock} left" : 'In stock');
                                $badgeBg = match($stockClass) {
                                    'in-stock'  => 'bg-green-100 text-green-800',
                                    'low-stock' => 'bg-yellow-100 text-yellow-800',
                                    default     => 'bg-red-100 text-red-800',
                                };
                            @endphp

                            <article
                                class="product-card group bg-white border border-[#e4e4e7] rounded-xl sm:rounded-2xl overflow-hidden flex flex-col shadow-sm hover:-translate-y-1 hover:shadow-md transition-all duration-300 ease-in-out"
                                data-cat="{{ $product->brand_id }}"
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
                                        {{ $product->brand->name ?? 'Ink' }}
                                    </div>
                                    <div class="font-['Fraunces',serif] text-sm sm:text-lg font-semibold text-[#27272a] leading-tight line-clamp-2" title="{{ $product->name }}">
                                        {{ $product->name }}
                                    </div>

                                    @if (!empty($product->specifications['Compatible Printers']))
                                        <div class="hidden sm:block text-xs text-[#71717a] line-clamp-1">
                                            Fits: {{ $product->specifications['Compatible Printers'] }}
                                        </div>
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
            @empty
                <div class="text-center py-24 text-[#71717a]">
                    <p class="text-lg">No ink cartridges found.</p>
                </div>
            @endforelse
        </div>
    </main>

    @include('layouts.footer')
</body>

</html>
