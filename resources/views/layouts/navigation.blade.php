<nav x-data="{ mobileMenuOpen: false }" class="bg-white border-b border-gray-200 sticky top-0 z-50">
    <!-- Main container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Flex wrapper -->
        <div class="flex justify-between h-16">
            
            <!-- Left: Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img class="h-8 w-auto" src="{{ asset('storage/images/logo-icon-only.png') }}" alt="Logo">
                </a>
            </div>

            <!-- Center: Desktop Links (Hidden below lg) -->
            <div class="hidden lg:flex lg:items-center lg:space-x-8">
                <!-- Home -->
                <a href="{{ route('dashboard') }}" class="relative group text-[#0D0D0B] hover:text-[#1D9E75] px-3 py-2 rounded-md text-sm font-medium">
                    Home
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#1D9E75] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
                
                <!-- Products Dropdown -->
                <div x-data="{ dropdownOpen: false }" class="relative" @click.outside="dropdownOpen = false">
                    <button @click="dropdownOpen = !dropdownOpen" class="relative group flex items-center text-[#0D0D0B] hover:text-[#1D9E75] px-3 py-2 rounded-md text-sm font-medium">
                        Products
                        <svg class="ml-1 h-4 w-4 transition-transform duration-200" :class="dropdownOpen ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#1D9E75] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>
                    <!-- Dropdown Menu -->
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 scale-100"
                         x-transition:leave-end="opacity-0 scale-95"
                         x-cloak 
                         class="absolute left-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1">
                            <a href="{{ route('collections.printers.index') }}" class="block px-4 py-2 text-sm text-[#0D0D0B] hover:bg-gray-100">Printers</a>
                            <a href="{{ route('collections.toners.index') }}" class="block px-4 py-2 text-sm text-[#0D0D0B] hover:bg-gray-100">Toners</a>
                            <a href="{{ route('collections.papers.index') }}" class="block px-4 py-2 text-sm text-[#0D0D0B] hover:bg-gray-100">Papers</a>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <a href="{{ route('services') }}" class="relative group text-[#0D0D0B] hover:text-[#1D9E75] px-3 py-2 rounded-md text-sm font-medium">
                    Services
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#1D9E75] transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
            </div>

            <!-- Right: Actions -->
            <div class="flex items-center space-x-4">
                
                @auth
                    <!-- Cart -->
                    <a href="#" class="text-[#0D0D0B] hover:text-[#1D9E75]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </a>

                    <!-- Account Dropdown (Desktop/Tablet) -->
                    <div x-data="{ accountOpen: false }" class="hidden sm:block relative" @click.outside="accountOpen = false">
                        <button @click="accountOpen = !accountOpen" class="flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1D9E75]">
                            <svg class="h-8 w-8 text-[#0D0D0B] hover:text-[#1D9E75]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        <div x-show="accountOpen" 
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             x-cloak 
                             class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5">
                            <div class="px-4 py-2 text-sm text-[#0D0D0B] border-b border-gray-200">
                                <div class="font-bold">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                                <div class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</div>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-[#0D0D0B] hover:bg-gray-100">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-[#D85A30] hover:bg-gray-100">Log Out</button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Guest links (Desktop/Tablet) -->
                    <div class="hidden sm:flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-[#0D0D0B] hover:text-[#1D9E75]">Sign In</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium bg-[#1D9E75] text-white px-4 py-2 rounded-md hover:bg-[#15825f]">Register</a>
                    </div>
                @endauth

                <!-- Hamburger toggle (Visible below lg) -->
                <div class="flex items-center lg:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-[#0D0D0B] hover:text-[#1D9E75] hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#1D9E75]">
                        <svg x-show="!mobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Mobile Drawer (Visible below lg) -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         x-cloak 
         class="lg:hidden border-t border-gray-200 bg-white">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-base font-medium text-[#0D0D0B] hover:text-[#1D9E75] hover:bg-gray-50">Home</a>
            
            <div x-data="{ mobileProductsOpen: false }">
                <button @click="mobileProductsOpen = !mobileProductsOpen" class="w-full flex items-center justify-between px-4 py-2 text-base font-medium text-[#0D0D0B] hover:text-[#1D9E75] hover:bg-gray-50">
                    Products
                    <svg class="h-5 w-5 transition-transform" :class="mobileProductsOpen ? 'rotate-180' : ''" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div x-show="mobileProductsOpen" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-2"
                     x-cloak 
                     class="pl-8 space-y-1">
                    <a href="{{ route('collections.printers.index') }}" class="block px-4 py-2 text-sm font-medium text-gray-500 hover:text-[#1D9E75] hover:bg-gray-50">Printers</a>
                    <a href="{{ route('collections.toners.index') }}" class="block px-4 py-2 text-sm font-medium text-gray-500 hover:text-[#1D9E75] hover:bg-gray-50">Toners</a>
                    <a href="{{ route('collections.papers.index') }}" class="block px-4 py-2 text-sm font-medium text-gray-500 hover:text-[#1D9E75] hover:bg-gray-50">Papers</a>
                </div>
            </div>

            <a href="{{ route('services') }}" class="block px-4 py-2 text-base font-medium text-[#0D0D0B] hover:text-[#1D9E75] hover:bg-gray-50">Services</a>
        </div>

        <div class="pt-4 pb-3 border-t border-gray-200">
            @auth
                <!-- Mobile Auth Details -->
                <div class="px-4 mb-3 sm:hidden">
                    <div class="text-base font-medium text-[#0D0D0B]">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                <div class="space-y-1 sm:hidden">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-[#1D9E75] hover:bg-gray-50">Profile</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-base font-medium text-[#D85A30] hover:bg-gray-50">Log Out</button>
                    </form>
                </div>
            @else
                <!-- Mobile Guest Links -->
                <div class="space-y-1 sm:hidden">
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-[#1D9E75] hover:bg-gray-50">Sign In</a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-base font-medium text-[#1D9E75] hover:bg-gray-50">Register</a>
                </div>
            @endauth
        </div>
    </div>
</nav>
