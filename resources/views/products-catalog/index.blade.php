<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products Catalog | Vin Copy Print Scan</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,900i&family=dm-sans:300,400,500" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f8f9fa] text-[#212529] font-sans antialiased min-h-screen flex flex-col">
    @include('layouts.navigation')

    <div class="max-w-7xl mx-auto w-full px-4 md:px-6 my-8 md:my-12 flex flex-col md:flex-row gap-6 md:gap-8 items-start flex-1">
        <!-- Sidebar Filters -->
        <aside class="w-full md:w-[280px] shrink-0 md:sticky md:top-8">
            <h2 class="text-2xl font-bold mb-6 text-[#212529]">Filters</h2>

            <form action="{{ route('products.index') }}" method="GET" id="filter-form">

                <!-- Category Filter -->
                <div class="mb-8">
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#6c757d] p-2 mb-4 rounded bg-white/50">Category</div>
                    <ul class="flex flex-col gap-3 m-0 p-0 list-none">
                        @foreach ($categories as $category)
                            <li>
                                {{-- Allow only the authenticated user to tick the checkbox --}}
                                @auth
                                    <label class="flex items-center gap-3 cursor-pointer text-sm text-[#212529]">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                            {{ is_array(request('categories')) && in_array($category->id, request('categories')) ? 'checked' : '' }}
                                            onchange="document.getElementById('filter-form').submit();"
                                            class="w-4 h-4 border border-[#dee2e6] rounded text-[#0056b3] cursor-pointer focus:ring-[#0056b3]">
                                        {{ $category->name }}
                                    </label>
                                @else
                                    <label class="flex items-center gap-3 cursor-not-allowed text-sm text-[#6c757d] opacity-75">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                            {{ is_array(request('categories')) && in_array($category->id, request('categories')) ? 'checked' : '' }}
                                            onchange="document.getElementById('filter-form').submit();" disabled
                                            class="w-4 h-4 border border-[#dee2e6] rounded text-[#0056b3] focus:ring-[#0056b3]">
                                        {{ $category->name }}
                                    </label>
                                @endauth
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Price Range Filter -->
                <div class="mb-8">
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#6c757d] p-2 mb-4 rounded bg-white/50">Price Range</div>
                    <div class="flex items-center gap-2 flex-wrap sm:flex-nowrap">
                        <div class="relative flex-1">
                            <span class="absolute left-2.5 top-1/2 -translate-y-1/2 text-[#6c757d] text-sm">$</span>
                            <input type="number" name="min_price" placeholder="Min" value="{{ request('min_price') }}" min="0" class="w-full pl-6 pr-2 py-2 border border-[#dee2e6] rounded text-sm focus:border-[#0056b3] focus:ring-1 focus:ring-[#0056b3] outline-none transition-colors">
                        </div>
                        <span class="text-[#6c757d] font-medium">-</span>
                        <div class="relative flex-1">
                            <span class="absolute left-2.5 top-1/2 -translate-y-1/2 text-[#6c757d] text-sm">$</span>
                            <input type="number" name="max_price" placeholder="Max" value="{{ request('max_price') }}" min="0" class="w-full pl-6 pr-2 py-2 border border-[#dee2e6] rounded text-sm focus:border-[#0056b3] focus:ring-1 focus:ring-[#0056b3] outline-none transition-colors">
                        </div>
                    </div>
                    @auth
                        <button type="submit" class="w-full mt-4 py-2 px-4 bg-[#dee2e6]/50 hover:bg-[#dee2e6] border border-[#dee2e6] rounded text-sm font-medium transition-colors cursor-pointer text-[#212529]">
                            Apply Price
                        </button>
                    @else
                        <button type="submit" class="w-full mt-4 py-2 px-4 bg-[#dee2e6]/30 border border-[#dee2e6]/50 rounded text-sm font-medium text-[#6c757d] cursor-not-allowed" disabled>
                            Sign in to Apply Price
                        </button>
                    @endauth
                </div>

                <!-- Hidden sort field to keep sort state when filtering -->
                @if (request()->has('sort'))
                    <input type="hidden" name="sort" value="{{ request('sort') }}">
                @endif
            </form>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 min-w-0">
            <!-- Top Bar -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8 pb-4 border-b border-[#dee2e6]">
                <div class="text-sm text-[#6c757d]">
                    Showing {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }} of {{ $products->total() }} products
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center gap-2 text-sm text-[#212529] w-full sm:w-auto">
                    <label for="sort" class="font-medium shrink-0">Sort by:</label>
                    <select name="sort" id="sort" form="filter-form" onchange="document.getElementById('filter-form').submit();" class="py-1.5 pl-2 pr-8 border border-[#dee2e6] rounded text-sm bg-white cursor-pointer focus:border-[#0056b3] focus:ring-1 focus:ring-[#0056b3] outline-none w-full sm:w-auto">
                        <option value="recommended" {{ request('sort') == 'recommended' ? 'selected' : '' }}>Recommended</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price High to Low</option>
                    </select>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($products as $product)
                    @include('components.product-card-catalog', ['product' => $product])
                @empty
                    <div class="col-span-full text-center p-12 text-[#6c757d] bg-white rounded-xl border border-[#dee2e6]">
                        No products found matching your criteria.
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($products->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $products->links('vendor.pagination.catalog-pagination') }}
                </div>
            @endif
        </main>
    </div>

    @include('layouts.footer')
</body>

</html>
