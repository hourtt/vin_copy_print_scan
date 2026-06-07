<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toners & Ink - {{ config('app.name') }}</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600|dm-sans:400,500,600" rel="stylesheet" />
    
    <!-- Link the new unified Minimalist CSS -->
     @vite(['resources/css/app.css', 
            'resources/js/app.js',
           'resources/css/base-styling-index-page.css', 
           'resources/css/collections-minimal.css',
           'resources/js/category-filter.js'])
</head>
<body>
    @include('layouts.navigation')

    {{-- Clean, Minimalist Hero --}}
    <div class="collection-hero">
        <h1>Toners & Ink</h1>
        <p>Reliable, high-yield cartridges to keep your workspace flowing without interruption.</p>
    </div>

    {{-- Controls bar --}}
    <div class="controls-bar">
        <div class="search-wrap">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
            </svg>
            <input type="search" id="toner-search" placeholder="Search toner models..." aria-label="Search toners">
        </div>

        <div class="pill-group" id="cat-pills">
            <button class="pill active" data-cat="all" onclick="filterCategory(this)">All</button>
            @foreach ($category as $cat)
                <button class="pill" data-cat="{{ $cat->id }}" onclick="filterCategory(this)">{{ $cat->name }}</button>
            @endforeach
        </div>

        <select class="sort-select" id="sort-select" aria-label="Sort toners">
            <option value="default">Sort: Default</option>
            <option value="price-asc">Price: Low - High</option>
            <option value="price-desc">Price: High - Low</option>
            <option value="name-asc">Name: A - Z</option>
        </select>
    </div>

    {{-- Main content --}}
    <main class="collection-main" style="max-width: 1280px; margin: 0 auto; padding: 0 1.5rem;">
        <p class="results-count" id="results-count" style="margin-bottom: 2rem; color: var(--theme-text-muted);">
            Showing <strong id="count-num">{{ $products->count() }}</strong> items
        </p>

        {{-- Product Groups --}}
        <div id="product-groups">
            @foreach ($products->groupBy('category_id') as $catId => $grouped)
                @php $catName = $grouped->first()->category->name ?? 'Uncategorized'; @endphp
                
                <section class="category-section" data-cat="{{ $catId }}">
                    <div class="category-heading" style="margin-bottom: 1.5rem;">
                        <h2 style="font-family: 'Fraunces', serif; font-size: 1.5rem;">{{ $catName }}</h2>
                    </div>

                    <div class="product-grid" id="grid-{{ $catId }}">
                        @foreach ($grouped as $product)
                            @php
                                $stock = (int) $product->stock;
                                $stockClass = $stock <= 0 ? 'out-stock' : ($stock <= 5 ? 'low-stock' : 'in-stock');
                                $stockLabel = $stock <= 0 ? 'Out of stock' : ($stock <= 5 ? "Only {$stock} left" : 'In stock');
                            @endphp
                            
                            <article class="product-card" data-cat="{{ $product->category_id }}" data-name="{{ strtolower($product->name) }}" data-price="{{ $product->price }}">
                                
                                <div class="card-image">
                                    @if ($product->image)
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy">
                                    @else
                                        <span style="color: var(--theme-text-muted);">No image</span>
                                    @endif
                                    <span class="stock-badge {{ $stockClass }}">{{ $stockLabel }}</span>
                                </div>

                                <div class="card-body">
                                    <div class="card-cat">{{ $product->category->name ?? 'Toner' }}</div>
                                    <div class="card-name">{{ $product->name }}</div>
                                    
                                    @if($product->compatibility)
                                        <div class="card-specs">Fits: {{ $product->compatibility }}</div>
                                    @endif

                                    <div class="card-footer">
                                        <span class="card-price">${{ number_format($product->price, 2) }}</span>
                                        
                                        @auth
                                            <button class="btn-add-cart" @if ($stock <= 0) disabled style="opacity: 0.5; cursor: not-allowed;" @endif>
                                                {{ $stock <= 0 ? 'Unavailable' : 'Add to Cart' }}
                                            </button>
                                        @else
                                            <a href="{{ route('login') }}" class="btn-add-cart" style="background: var(--theme-bg); color: var(--theme-text); border: 1px solid var(--theme-border); text-decoration: none;">Sign In</a>
                                        @endauth
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endforeach
        </div>
    </main>

    @include('layouts.footer')
</body>
</html>