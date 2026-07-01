<section class="bg-[#f8f9fa] py-16 px-4 md:px-8">
    <div class="max-w-[1280px] mx-auto">
        {{-- Header row --}}
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
            <div>
                <h2 class="font-sans text-[1.75rem] font-semibold text-[#1a1a2e] mb-1">
                    Welcome back, {{ Auth::user()->first_name }}!
                </h2>
                <p class="text-[#1a1a2e]/60 text-base">
                    Here is an overview of your account and recent activity.
                </p>
            </div>
            <a href="{{ route('profile.edit') }}"
                class="inline-flex items-center px-4 py-2 bg-white border border-[#1a1a2e]/10 rounded-lg text-sm font-medium text-[#1a1a2e] hover:bg-[#f8f9fa] transition-colors">
                Manage Profile
            </a>
        </div>

        {{-- Cards grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Profile Card --}}
            <div class="bg-white border border-[#1a1a2e]/10 rounded-xl p-8 flex flex-col items-center text-center hover:shadow-md transition-shadow duration-200">
                <div class="w-16 h-16 bg-[#1a1a2e] text-white rounded-full flex items-center justify-center text-2xl font-semibold mb-4">
                    {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                </div>
                <h3 class="font-sans text-xl font-semibold text-[#1a1a2e] mb-1">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </h3>
                <p class="text-[#1a1a2e]/55 text-sm mb-4">{{ Auth::user()->email }}</p>
                <div class="bg-[#f8f9fa] px-3 py-1 rounded-full text-xs font-semibold text-blue-600 uppercase tracking-wide">
                    @if (Auth::user()->role === 'admin')
                        Admin
                    @else
                        {{ Auth::user()->role ?? 'Customer' }}
                    @endif
                </div>
            </div>

            {{-- Orders Card --}}
            <div class="bg-white border border-[#1a1a2e]/10 rounded-xl p-8 flex flex-col hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center gap-3 mb-4 text-blue-600">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    <h3 class="font-sans text-lg font-semibold text-[#1a1a2e]">Recent Orders</h3>
                </div>
                <div class="flex-1 flex flex-col justify-center">
                    <div class="text-[2.5rem] font-bold text-[#1a1a2e] mb-2 leading-none">0</div>
                    <p class="text-[#1a1a2e]/55 text-sm">No orders placed yet. Start shopping to see your history.</p>
                </div>
                <div class="mt-6">
                    <a href="{{ route('products.printers.index') }}"
                        class="text-blue-600 font-semibold text-sm hover:text-blue-800 transition-colors">
                        Browse Products &rarr;
                    </a>
                </div>
            </div>

            {{-- Saved & Vouchers Card --}}
            <div class="bg-white border border-[#1a1a2e]/10 rounded-xl p-8 flex flex-col hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center gap-3 mb-4 text-blue-600">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                        <line x1="7" y1="7" x2="7.01" y2="7"></line>
                    </svg>
                    <h3 class="font-sans text-lg font-semibold text-[#1a1a2e]">Saved & Vouchers</h3>
                </div>
                <div class="flex-1 flex flex-col justify-center gap-4">
                    <div class="flex justify-between items-baseline border-b border-[#1a1a2e]/10 pb-2">
                        <span class="text-[#1a1a2e]/55 text-sm">Wishlist Items</span>
                        <span class="text-xl font-semibold text-[#1a1a2e]">0</span>
                    </div>
                    <div class="flex justify-between items-baseline border-b border-[#1a1a2e]/10 pb-2">
                        <span class="text-[#1a1a2e]/55 text-sm">Active Vouchers</span>
                        <span class="text-xl font-semibold text-[#1a1a2e]">0</span>
                    </div>
                </div>
                <div class="mt-6">
                    <a href="#" class="text-blue-600 font-semibold text-sm hover:text-blue-800 transition-colors">
                        View Details &rarr;
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
