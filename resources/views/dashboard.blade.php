<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'PrintCo') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,900i&family=dm-sans:300,400,500,600"
        rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased overflow-x-hidden w-full relative">
    {{-- NAVIGATION --}}
    @include('layouts.navigation')

    {{-- Cinematic Hero --}}
    @include('components.cinematic-hero')

    @include('components.ticker-bar')


    {{-- ACCOUNT QUICK-STATS (auth users only)  --}}
    @auth
        @include('auth.account-quick-state')
    @endauth


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
