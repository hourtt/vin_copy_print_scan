 @guest
     <div class="guest-banner">
         🛍️ You're browsing as a guest — <a href="{{ route('login') }}">sign in</a> or <a
             href="{{ route('register') }}">create an account</a> to unlock purchasing.
     </div>
 @endguest

 <style src="{{ asset('app.css') }}"></style>

 <nav x-data="{ open: false, dropdownOpen: false }" class="vd-nav">
     <div class="vd-nav-inner">

         {{-- ── LOGO ── --}}
         <a href="{{ route('dashboard') }}" class="vd-logo">
             <img src="{{ asset('storage/images/logo-icon-only.png') }}" alt="{{ config('app.name', 'App') }} logo">
         </a>

         {{-- ── DESKTOP NAV LINKS ── --}}
         <ul class="vd-nav-links">
             <li>
                 <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                     {{ __('Shop') }}
                 </a>
             </li>
             <li><a href="#">{{ __('Collections') }}</a></li>
             <li><a href="#">{{ __('About') }}</a></li>
         </ul>

         {{-- ── SEARCH BAR ── --}}
         <div class="vd-search-wrap">
             <input type="text" class="vd-search" placeholder="Search products…">
         </div>

         {{-- ── DESKTOP ACTIONS ── --}}
         <div class="vd-actions">
             @auth
                 {{-- Avatar chip + dropdown --}}
                 <div class="vd-dropdown-wrap" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                     <button class="vd-avatar-chip" @click="dropdownOpen = !dropdownOpen" :aria-expanded="dropdownOpen">
                         <div class="vd-avatar-dot">
                             {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                         </div>
                         {{ Auth::user()->first_name }}
                         <svg class="vd-chevron" :style="dropdownOpen ? 'transform:rotate(180deg)' : ''" viewBox="0 0 12 12"
                             fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" />
                         </svg>
                     </button>

                     {{-- Dropdown panel --}}
                     <div class="vd-dropdown" x-show="dropdownOpen" x-transition x-cloak>
                         <div class="vd-dropdown-header">
                             <div class="vd-dh-name">
                                 {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                             </div>
                             <div class="vd-dh-email">{{ Auth::user()->email }}</div>
                         </div>

                         <a href="{{ route('profile.edit') }}">
                             👤 {{ __('Profile') }}
                         </a>

                         <hr>

                         {{-- Logout — preserves Laravel's POST logout flow --}}
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <button type="submit" class="vd-dd-logout">
                                 🚪 {{ __('Log Out') }}
                             </button>
                         </form>
                     </div>
                 </div>
             @else
                 <a href="{{ route('login') }}" class="vd-btn vd-btn-ghost">
                     {{ __('Sign in') }}
                 </a>
                 <a href="{{ route('register') }}" class="vd-btn vd-btn-primary">
                     {{ __('Get started') }}
                 </a>
             @endauth
         </div>

         {{-- ── HAMBURGER (mobile) ── --}}
         <button class="vd-hamburger" @click="open = !open" :aria-expanded="open" aria-label="Toggle menu">
             <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                 <line x1="4" y1="6" x2="20" y2="6" />
                 <line x1="4" y1="12" x2="20" y2="12" />
                 <line x1="4" y1="18" x2="20" y2="18" />
             </svg>
             <svg x-show="open" x-cloak xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round">
                 <line x1="6" y1="6" x2="18" y2="18" />
                 <line x1="6" y1="18" x2="18" y2="6" />
             </svg>
         </button>

     </div>

     {{-- ── MOBILE MENU DRAWER ── --}}
     <div class="vd-mobile-menu" :class="{ 'open': open }" x-show="open" x-transition x-cloak>

         <ul class="vd-mobile-links">
             <li>
                 <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                     {{ __('Shop') }}
                 </x-responsive-nav-link>
             </li>
             <li><a href="#">{{ __('Collections') }}</a></li>
             <li><a href="#">{{ __('About') }}</a></li>
         </ul>

         @auth
             <div class="vd-mobile-user">
                 <div class="vd-mu-name">
                     {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                 </div>
                 <div class="vd-mu-email">{{ Auth::user()->email }}</div>
                 <div class="vd-mobile-actions">
                     <a href="{{ route('profile.edit') }}" class="ma-profile">
                         {{ __('Profile') }}
                     </a>
                     <form method="POST" action="{{ route('logout') }}">
                         @csrf
                         <button type="submit" class="ma-logout">
                             {{ __('Log Out') }}
                         </button>
                     </form>
                 </div>
             </div>
         @else
             <div class="vd-mobile-actions" style="margin-top:1rem">
                 <a href="{{ route('login') }}" class="ma-login">{{ __('Sign in') }}</a>
                 <a href="{{ route('register') }}" class="ma-register">{{ __('Create account') }}</a>
             </div>
         @endauth
     </div>
 </nav>
