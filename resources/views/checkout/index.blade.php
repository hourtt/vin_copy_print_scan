<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout | {{ config('app.name', 'Vin Copy Print Scan') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,900i&family=dm-sans:300,400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="checkout-page" x-data="checkoutForm()">
    <!-- Header -->
    <header class="checkout-header">
        <div class="container">
            <a href="{{ url('/') }}" class="flex items-center gap-2 no-underline">
                <img src="{{asset('storage/images/logo-icon-only.webp')}}" alt="Logo" width="40" class="rounded-lg">
                <span class="font-['Fraunces',serif] font-bold text-xl text-[var(--brand)]">Vin Copy Print Scan</span>
            </a>
            <div class="checkout-secure">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                Secure Checkout
            </div>
        </div>
    </header>

    <!-- Step Indicator -->
    <div class="step-indicator">
        <div class="step-indicator-progress" :style="`width: ${(step - 1) * 50}%`"></div>
        
        <div class="step-item" :class="{ 'active': step === 1, 'completed': step > 1 }">
            <div class="step-circle" x-text="step > 1 ? '✓' : '1'"></div>
            <div class="step-label">Delivery</div>
        </div>
        
        <div class="step-item" :class="{ 'active': step === 2, 'completed': step > 2 }">
            <div class="step-circle" x-text="step > 2 ? '✓' : '2'"></div>
            <div class="step-label">Payment</div>
        </div>
        
        <div class="step-item" :class="{ 'active': step === 3 }">
            <div class="step-circle">3</div>
            <div class="step-label">Review</div>
        </div>
    </div>

    <!-- Main Container -->
    <main class="checkout-container">
        <form id="checkout-form" method="POST" action="{{ route('checkout.store') }}" class="contents">
            @csrf
            
            <input type="hidden" name="delivery_method" :value="deliveryMethod">
            <input type="hidden" name="payment_method" :value="paymentMethod">

            <div class="col-start-1">
                <!-- Steps Content -->
                <div x-show="step === 1" x-transition.opacity>
                    @include('checkout.partials.step-delivery')
                </div>

                <div x-show="step === 2" x-transition.opacity x-cloak>
                    @include('checkout.partials.step-payment')
                </div>

                <div x-show="step === 3" x-transition.opacity x-cloak>
                    @include('checkout.partials.step-review')
                </div>
            </div>

            <!-- Sidebar Summary -->
            <aside class="col-start-2">
                @include('checkout.partials.order-summary')
            </aside>
        </form>
    </main>

    <footer class="text-center p-8 text-[var(--ink-muted)] text-sm border-t border-[var(--border)] bg-[var(--surface-warm)]">
        <p>© {{ date('Y') }} Vin Copy Print Scan. Professional Grade Precision.</p>
        <div class="mt-2 flex gap-4 justify-center">
            <a href="#" class="text-inherit no-underline">Terms of Service</a>
            <a href="#" class="text-inherit no-underline">Privacy Policy</a>
            <a href="#" class="text-inherit no-underline">Contact Support</a>
        </div>
    </footer>


</body>
</html>
