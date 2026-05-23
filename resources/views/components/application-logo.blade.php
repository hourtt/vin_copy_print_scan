@if (request()->routeIs('login', 'register'))
    <img src="{{ asset('storage/images/logo-horizontal-layout.png') }}" 
         alt="Application Logo" 
         class="h-20 w-auto">
@else
    <img src="{{ asset('storage/images/logo-icon-only.png') }}" 
         alt="Application Logo" 
         class="h-10 w-20 object-contain">
@endif