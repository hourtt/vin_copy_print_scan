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

<body class="antialiased overflow-x-hidden w-full relative">
    {{-- NAVIGATION --}}
    @include('layouts.navigation')

    {{-- Cinematic Hero --}}
    @include('components.dashboard.cinematic-hero')

    @include('components.dashboard.ticker-bar')


    {{-- ACCOUNT QUICK-STATS (auth users only)  --}}
    @auth
        @include('components.dashboard.account-quick-state')
    @endauth


    {{--  SERVICES SHOWCASE --}}
    @include('components.dashboard.the-advantage')

    {{-- HOW IT WORKS --}}
    @include('components.dashboard.how-it-works')

    {{-- PROMOTIONAL BANNER --}}
    {{-- @include('components.dashboard.promotional-banner') --}}


    {{-- FEATURED PRODUCTS --}}
    @include('components.dashboard.featured-products')

    {{-- FOOTER --}}
    @include('layouts.footer')

</body>

</html>
