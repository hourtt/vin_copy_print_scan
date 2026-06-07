@props([
    'brandName' => config('app.name', 'Vin Copy Print Scan'),
])

<div id="desktop-warning-overlay" class="dw-overlay">
    <div class="dw-container">
        
        {{-- Brand Header --}}
        <div class="dw-brand">
            {{-- Updated: Removed inline styles, added class --}}
            <img src="{{ asset('storage/images/logo-icon-only.png') }}" alt="{{ $brandName }} logo" class="dw-logo">
            <span class="dw-brand-text">{{ $brandName }}</span>
        </div>

        {{-- Typography matching the screenshot --}}
        <h1 class="dw-title">Oops! Sorry</h1>
        <h2 class="dw-subtitle">It looks like your screen is a bit too narrow.</h2>

        <p class="dw-text">
            Our website requires bigger screen for best user experience.<br>
            Please maximize your browser window or switch to a desktop device (1280px or wider).<br>
        </p>
    </div>
</div>