<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Shop') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,900i&family=dm-sans:300,400,500"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{--  NAVIGATION + GUEST BANNER  --}}
    @include('layouts.navigation')

    {{--  HERO  --}}
    @include('layouts.hero')

    {{--  ACCOUNT QUICK-STATS (auth only)  --}}
    @include('auth.account-quick-state')

    {{--  PRODUCTS  --}}
    <section class="section" id="products">
        <div class="section-header">
            <h2>Featured Products</h2>
            <a href="#">View all →</a>
        </div>

        {{-- Category filter pills --}}
        <div class="category-pills">
            {{-- No data-category on All pill; JS treats undefined as "show all" --}}
            <button class="pill active" onclick="filterPills(this)">All</button>
            @foreach ($category as $cat)
                <button class="pill" onclick="filterPills(this)"
                    data-category="{{ $cat->id }}">{{ $cat->name }}</button>
            @endforeach
        </div>


        {{-- Skeleton grid shown while page hydrates; JS clears it once content is ready --}}
        <div id="skeleton-container" class="product-grid" aria-hidden="true"></div>

        {{-- CATEGORY GROUPED PRODUCTS --}}
        <div id="grouped-products-container">
            {{-- Laravel groups the collection by category_id --}}
            @foreach ($products->groupBy('category_id') as $categoryId => $groupedProducts)
                @php
                    $categoryName = $groupedProducts->first()->category->name ?? 'Uncategorized';
                @endphp
                <div class="category-section visible" data-category="{{ $categoryId }}">

                    {{-- Group Title with a nice divider line --}}
                    <h3 class="category-group-title">{{ $categoryName }}</h3>

                    {{-- The Grid for just this category's products --}}
                    <div class="product-grid">
                        @foreach ($groupedProducts as $product)
                            <div class="product-card" data-category="{{ $product->category_id }}">
                                <div class="product-img product-img-1">
                                    @if ($product->image)
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->product_name }}">
                                    @endif
                                </div>
                                <div class="product-body">
                                    <div class="product-category">{{ $product->category->name }}</div>
                                    <div class="product-name">{{ $product->product_name }}</div>
                                    <div class="product-footer">
                                        <div class="product-price">${{ number_format($product->price, 2) }}</div>
                                        <div class="product-stock">{{ $product->stock }} in stock</div>
                                    </div>

                                    @auth
                                        <button class="btn btn-buy">Add to cart</button>
                                    @else
                                        <a href="{{ route('login') }}" class="lock-cta">
                                            <span class="lock-icon">🔒</span> Sign in to purchase
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            @endforeach
        </div>
    </section>

    {{-- FEATURE STRIP --}}
    @include('layouts.feature-strip')

    {{-- JOIN CTA BANNER (guest only) --}}
    @include('layouts.cna-banner')

   {{-- Footer --}}

    @include('layouts.footer')

</body>

</html>
