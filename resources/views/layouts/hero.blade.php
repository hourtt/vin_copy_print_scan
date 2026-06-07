<section class="hero">
    <div>
        @auth
            <div class="hero-eyebrow fade-up fade-up-1">Welcome back</div>
            <h1 class="hero-greeting fade-up fade-up-2">
                Hey, <span>{{ Auth::user()->first_name }}</span>.<br>
                Good to see you.
            </h1>
            <p class="fade-up fade-up-3">
                Your account is ready to go. Browse our latest drops, pick your favourites, and check out in seconds.
            </p>
            <div class="hero-cta fade-up fade-up-4">
                <a href="#products" class="btn btn-primary">Browse products</a>
                <a href="{{ route('profile.edit') }}" class="btn btn-ghost">My account</a>
            </div>
        @else
            <div class="hero-eyebrow fade-up fade-up-1">New arrivals just dropped</div>
            <h1 class="fade-up fade-up-2">
                Discover things<br>you'll <em>love.</em>
            </h1>
            <p class="fade-up fade-up-3">
                Explore our curated collections. Sign in to add items to your cart and start purchasing.
            </p>
            <div class="hero-cta fade-up fade-up-4">
                <a href="#products" id="explore-btn" class="btn btn-primary btn-explore">Explore products</a>
                <a href="{{ route('register') }}" class="btn btn-ghost">Create account</a>
            </div>
        @endauth
    </div>

    <div class="hero-visual fade-up fade-up-3">
        @if ($heroProduct)
            <div class="hero-card-stack">
                <div class="card-bg"></div>
                <div class="card-bg"></div>
                <div class="card-main">
                    <div class="card-main-img">
                        🌿
                        <div class="card-badge">{{ $heroProduct->category->name }}</div>
                    </div>
                    <div class="card-main-body">
                        <h4>{{ $heroProduct->name }}</h4>
                        <div class="price">${{ number_format($heroProduct->price, 2) }}</div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
