<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PrintCo') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,900i&family=dm-sans:300,400,500,600"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- TODO : Implement desktop-only warning component & make the mobile screen phone still work --}}
<body>
    <x-desktop-only-warning brandName="Vin Copy Print Scan" />
    {{-- NAVIGATION --}}
    @include('layouts.navigation')

    {{-- Cinematic Hero --}}
    @include('components.cnimeatic-hero')

    @include('components.ticker-bar')


    {{-- ACCOUNT QUICK-STATS (auth users only)  --}}
    {{-- @auth
        <div class="account-section">
            <div class="container">
                @include('auth.account-quick-state')
            </div>
        </div>
    @endauth --}}


    {{--  SERVICES SHOWCASE --}}
    @include('components.service-showcase')

    {{-- HOW IT WORKS --}}
    @include('components.how-it-works')

    {{-- PROMOTIONAL BANNER --}}
    {{-- @include('components.promotional-banner') --}}


    {{-- FEATURED PRODUCTS --}}
    @include('components.featured-products')

    {{-- Trust Signals --}}
    @include('components.trust-signal')

    {{-- FOOTER --}}
    @include('layouts.footer')

</body>

</html>
