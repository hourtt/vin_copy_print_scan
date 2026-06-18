<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papers — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,900i&family=dm-sans:300,400,500"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/category-filter.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>

<body class="font-sans antialiased bg-white text-[#27272a] overflow-x-hidden">

    @include('layouts.navigation')

    {{-- Hero --}}
    <div class="pt-24 pb-12 px-8 text-center bg-transparent">
        <h1 class="font-khmer text-5xl font-medium text-[#27272a] tracking-tight leading-tight">
            ក្រដាស (Papers)
        </h1>
        <p class="mt-4 text-[#71717a] text-lg max-w-[500px] mx-auto">
            ក្រដាសរ៉ាមដែលមានគុណភាពល្អ ប្រើយ៉ាងមានទំនុកចិត្ត មិនព្រួយបារម្ភអំពីការធ្វើឲ្យម៉ាស៊ីនមានបញ្ហា
        </p>
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
            <input type="search" id="paper-search" placeholder="Search by paper name strictly…"
                aria-label="Search paper products"
                class="w-full pl-11 pr-4 py-3 border border-[#e4e4e7] rounded-lg text-sm bg-white text-[#27272a] placeholder-[#71717a] focus:outline-none focus:border-[#3f3f46] focus:ring-2 focus:ring-[#3f3f46]/10 transition-all">
        </div>

        {{-- Category Pills --}}
        <div class="flex flex-wrap gap-2 pb-1" id="cat-pills">
            <button class="pill active px-4 py-2 rounded-full border border-transparent bg-[#27272a] text-white text-sm font-medium transition-all duration-200 cursor-pointer"
                data-cat="all">All</button>
            @foreach ($category as $cat)
                <button class="pill px-4 py-2 rounded-full border border-[#e4e4e7] bg-white text-[#71717a] text-sm font-medium transition-all duration-200 cursor-pointer hover:border-[#3f3f46] hover:text-[#3f3f46]"
                    data-cat="{{ $cat->id }}">{{ $cat->name }}</button>
            @endforeach
        </div>

        {{-- Sort --}}
        <select id="sort-select" aria-label="Sort paper"
            class="py-[0.65rem] pl-4 pr-9 border border-[#e4e4e7] rounded-lg text-sm text-[#27272a] bg-white cursor-pointer focus:outline-none focus:border-[#3f3f46] transition-colors appearance-none"
            style="background-image: url('data:image/svg+xml;utf8,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"%235f5e5a\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M6 9l6 6 6-6\"/></svg>'); background-repeat: no-repeat; background-position: right 0.8rem center; background-size: 14px;">
            <option value="default">Sort: Default</option>
            <option value="price-asc">Price: Low → High</option>
            <option value="price-desc">Price: High → Low</option>
            <option value="name-asc">Name A → Z</option>
            <option value="stock-desc">Most in Stock</option>
        </select>
    </div>

    {{-- Main content --}}
    <main class="max-w-[1280px] mx-auto px-6 pb-16">

        <p class="text-sm text-[#71717a] mb-6" id="results-count">
            Showing <strong id="count-num">{{ $products->count() }}</strong> items
        </p>

        {{-- Product Grid Area --}}
        <div class="relative min-h-[400px]" id="grid-container">
            {{-- Skeleton Loader (Hidden by default) --}}
            <div id="skeleton-grid" class="absolute inset-0 z-10 bg-white" style="display: none;">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 sm:gap-5 animate-pulse">
                    @for ($i = 0; $i < 10; $i++)
                        <div class="bg-gray-200 rounded-xl sm:rounded-2xl h-[250px] sm:h-[300px] w-full"></div>
                    @endfor
                </div>
            </div>

            {{-- Empty State (Hidden by default) --}}
            <div id="empty-state" style="display: none;" class="absolute inset-0 z-10 flex flex-col items-center justify-center text-center py-24 text-[#71717a] bg-white">
                <p class="text-lg">No products found matching your filters.</p>
            </div>

            {{-- Product Groups --}}
            <div id="product-groups" class="transition-opacity duration-150 relative z-0">
                @include('collections.papers._grid')
            </div>
        </div>
    </main>

    @include('layouts.footer')
</body>

</html>
