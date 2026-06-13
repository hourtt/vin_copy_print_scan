<nav x-data="{ open: false, dropdownOpen: false }" class="sticky top-0 z-[100] bg-white text-black border-b border-[#1a1a2e]/10 px-4 md:px-8 font-sans transition-all duration-300">
    <div class="max-w-7xl mx-auto h-[72px] flex items-center justify-between gap-4 md:gap-8 relative">
        {{-- LOGO --}}
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 shrink-0">
            <img src="{{ asset('storage/images/logo-icon-only.png') }}" alt="Logo" class="rounded-[10px] h-9 w-auto block">
        </a>

        {{-- DESKTOP NAV LINKS --}}
        <ul class="md:flex items-center gap-8 absolute left-1/2 -translate-x-1/2 m-0 p-0">
            <li>
                @php $isHomeActive = request()->routeIs('dashboard'); @endphp
                <a href="{{ route('dashboard') }}" class="relative py-2 font-medium transition-colors duration-300 group {{ $isHomeActive ? 'text-[#1a1a2e]' : 'text-[#1a1a2e]/70 hover:text-[#1a1a2e]' }}">
                    {{ __('Home') }}
                    <span class="absolute left-0 bottom-0 w-full h-[2px] bg-blue-600 transition-opacity duration-300 {{ $isHomeActive ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }}"></span>
                </a>
            </li>
            <li class="relative" x-data="{ productsDropdownOpen: false }" @mouseenter="productsDropdownOpen = true" @mouseleave="productsDropdownOpen = false">
                @php
                    $isProductsActive = request()->routeIs('collections.printers.*') || request()->routeIs('collections.toners.*') || request()->routeIs('collections.papers.*');
                @endphp
                <button class="relative py-2 flex items-center gap-1 font-medium transition-colors duration-300 group {{ $isProductsActive ? 'text-[#1a1a2e]' : 'text-[#1a1a2e]/70 hover:text-[#1a1a2e]' }}">
                    {{ __('Products') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300" :class="{ 'rotate-180': productsDropdownOpen }">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                    <span class="absolute left-0 bottom-0 w-full h-[2px] bg-blue-600 transition-opacity duration-300 {{ $isProductsActive ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }}"></span>
                </button>
                <div x-show="productsDropdownOpen" 
                     x-transition:enter="transition-opacity ease-out duration-200"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition-opacity ease-in duration-150"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="absolute left-1/2 -translate-x-1/2 top-[100%] pt-2 w-48 z-50" x-cloak>
                    <div class="bg-white border border-[#1a1a2e]/10 rounded-xl shadow-lg py-2 overflow-hidden">
                        <a href="{{ route('collections.printers.index') }}" class="block px-4 py-2 text-sm transition-colors {{ request()->routeIs('collections.printers.*') ? 'font-semibold text-blue-600 bg-gray-50' : 'text-[#1a1a2e]/70 hover:bg-gray-100 hover:text-blue-600' }}">Printers</a>
                        <a href="{{ route('collections.toners.index') }}" class="block px-4 py-2 text-sm transition-colors {{ request()->routeIs('collections.toners.*') ? 'font-semibold text-blue-600 bg-gray-50' : 'text-[#1a1a2e]/70 hover:bg-gray-100 hover:text-blue-600' }}">Toners</a>
                        <a href="{{ route('collections.papers.index') }}" class="block px-4 py-2 text-sm transition-colors {{ request()->routeIs('collections.papers.*') ? 'font-semibold text-blue-600 bg-gray-50' : 'text-[#1a1a2e]/70 hover:bg-gray-100 hover:text-blue-600' }}">Papers</a>
                    </div>
                </div>
            </li>
            <li>
                @php $isServicesActive = request()->routeIs('services'); @endphp
                <a href="{{ route('services') }}" class="relative py-2 font-medium transition-colors duration-300 group {{ $isServicesActive ? 'text-[#1a1a2e]' : 'text-[#1a1a2e]/70 hover:text-[#1a1a2e]' }}">
                    {{ __('Services') }}
                    <span class="absolute left-0 bottom-0 w-full h-[2px] bg-blue-600 transition-opacity duration-300 {{ $isServicesActive ? 'opacity-100' : 'opacity-0 group-hover:opacity-100' }}"></span>
                </a>
            </li>
        </ul>

        {{-- RIGHT SIDE ACTIONS & MOBILE MENU TOGGLE --}}
        <div class="flex items-center gap-3.5 md:gap-4 shrink-0">
            @auth
                {{-- Cart --}}
                <a href="#" class="text-[#1a1a2e] flex items-center hover:text-blue-600 transition-colors" title="Shopping Cart">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </a>

                {{-- Orders Activity --}}
                <a href="#" class="text-[#1a1a2e] flex items-center hover:text-blue-600 transition-colors" title="Order Activity">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </a>
            @endauth

            @auth
                <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                    <button @click="dropdownOpen = !dropdownOpen" :aria-expanded="dropdownOpen" class="bg-none border-none cursor-pointer text-[#1a1a2e] flex items-center hover:text-blue-600 transition-colors" title="My Account">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </button>
                    {{-- Dropdown panel --}}
                    <div x-show="dropdownOpen" x-transition x-cloak class="absolute right-0 top-full mt-2 bg-white border border-[#1a1a2e]/10 rounded-xl shadow-lg w-48 p-1.5 z-50 overflow-hidden">
                        <div class="p-2.5 border-b border-[#1a1a2e]/10 mb-1">
                            <div class="font-semibold text-sm text-[#1a1a2e]">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                            <div class="text-xs text-[#1a1a2e]/45 mt-0.5">{{ Auth::user()->email }}</div>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-[#1a1a2e] hover:bg-[#D3D3D3] transition-colors">
                            {{ __('Profile') }}
                        </a>
                        <hr class="border-t border-[#1a1a2e]/10 my-1 mx-0">
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="flex items-center gap-2 w-full text-left px-3 py-2 rounded-lg text-sm font-medium text-red-600 hover:bg-red-100 transition-colors">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="flex items-center gap-4">
                    {{-- Log in button (But with no background) --}}
                    <a href="{{ route('login') }}" class="text-sm font-medium text-[#1a1a2e] hover:text-blue-600 transition-colors">
                        {{ __('Sign In') }}
                    </a>
                    {{-- Register Button --}}
                    <a href="{{ route('register') }}" class="text-sm font-medium bg-[#1a1a2e] text-white px-4 py-2 rounded-lg hover:bg-[#2a2a4a] transition-all shadow-sm">
                        {{ __('Register') }}
                    </a>
                </div>
            @endauth

            {{-- HAMBURGER (mobile) --}}
            <button @click="open = !open" :aria-expanded="open" aria-label="Toggle menu" class="md:hidden flex items-center justify-center w-9 h-9 rounded-lg border border-[#ffff] bg-transparent text-[#1a1a2e] hover:bg-[#e8eee9] transition-colors cursor-pointer shrink-0">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="6" x2="20" y2="6" />
                    <line x1="4" y1="12" x2="20" y2="12" />
                    <line x1="4" y1="18" x2="20" y2="18" />
                </svg>
                <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU DRAWER --}}
    <div :class="{ 'block': open, 'hidden': !open }" x-show="open" x-transition x-cloak class="md:hidden border-t border-[#ffff] bg-[#ffff] px-6 pb-4 pt-4 absolute left-0 right-0 top-full shadow-lg">
        <ul class="flex flex-col m-0 p-0 mb-4">
            <li class="border-b border-[#1a1a2e]/5">
                <a href="{{ route('dashboard') }}" class="block py-3 text-sm font-medium transition-colors {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-[#1a1a2e]/75 hover:text-blue-600' }}">{{ __('Home') }}</a>
            </li>
            <li class="border-b border-[#1a1a2e]/5" x-data="{ mobileProductsOpen: false }">
                @php
                    $isProductsActive = request()->routeIs('collections.printers.*') || request()->routeIs('collections.toners.*') || request()->routeIs('collections.papers.*');
                @endphp
                <button @click="mobileProductsOpen = !mobileProductsOpen" class="w-full flex items-center justify-between py-3 text-sm font-medium transition-colors {{ $isProductsActive ? 'text-blue-600' : 'text-[#1a1a2e]/75 hover:text-blue-600' }}">
                    {{ __('Products') }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform duration-300" :class="{ 'rotate-180': mobileProductsOpen }">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
                <div x-show="mobileProductsOpen" x-transition.opacity x-cloak>
                    <ul class="pl-4 pb-2 space-y-1">
                        <li><a href="{{ route('collections.printers.index') }}" class="block py-2 text-sm transition-colors {{ request()->routeIs('collections.printers.*') ? 'text-blue-600 font-semibold' : 'text-[#1a1a2e]/75 hover:text-blue-600' }}">Printers</a></li>
                        <li><a href="{{ route('collections.toners.index') }}" class="block py-2 text-sm transition-colors {{ request()->routeIs('collections.toners.*') ? 'text-blue-600 font-semibold' : 'text-[#1a1a2e]/75 hover:text-blue-600' }}">Toners</a></li>
                        <li><a href="{{ route('collections.papers.index') }}" class="block py-2 text-sm transition-colors {{ request()->routeIs('collections.papers.*') ? 'text-blue-600 font-semibold' : 'text-[#1a1a2e]/75 hover:text-blue-600' }}">Papers</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{ route('services') }}" class="block py-3 text-sm font-medium transition-colors {{ request()->routeIs('services') ? 'text-blue-600' : 'text-[#1a1a2e]/75 hover:text-blue-600' }}">{{ __('Services') }}</a>
            </li>
        </ul>
        
        @auth
            <div class="py-3 border-t border-[#1a1a2e]/10 mt-2">
                <div class="font-semibold text-sm text-[#1a1a2e]">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                <div class="text-xs text-[#1a1a2e]/45 mb-3">{{ Auth::user()->email }}</div>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('profile.edit') }}" class="block w-full text-center p-2.5 rounded-lg text-sm font-medium bg-[#e8eee9] hover:bg-[#dce6dd] text-[#1a1a2e] transition-colors">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="m-0 w-full">
                        @csrf
                        <button type="submit" class="block w-full text-center p-2.5 rounded-lg text-sm font-medium border-2 border-red-600/30 text-red-600 hover:bg-red-50 transition-colors">Log Out</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
