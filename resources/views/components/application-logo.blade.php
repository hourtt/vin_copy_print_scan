@if (request()->routeIs('login', 'register'))
    <img src="{{ asset('storage/images/logo-horizontal-layout.webp') }}" 
         alt="Application Logo" 
         class="h-20 w-auto" loading="lazy">
@else
    <img src="{{ asset('storage/images/logo-icon-only.webp') }}" 
         alt="Application Logo" 
         class="h-10 w-20 object-contain" loading="lazy">
@endif