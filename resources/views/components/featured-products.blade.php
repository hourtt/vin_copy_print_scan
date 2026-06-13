@if (isset($featured) && $featured->count())
      <section class="bg-[#f8f9fa] py-20 px-8">
        <div class="max-w-[1280px] mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Left Column: Featured Printers --}}
                <div class="lg:col-span-2">
                    <div class="flex justify-between items-baseline mb-8">
                        <h2 class="font-sans text-2xl font-semibold text-[#1a1a2e]">Featured Printers</h2>
                        <a href="{{ route('collections.printers.index') }}" class="text-blue-600 font-semibold text-sm no-underline hover:text-blue-800 transition-colors">View All &rarr;</a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach ($featured->take(4) as $product)
                            <div class="bg-white border border-[#1a1a2e]/10 rounded-xl overflow-hidden flex flex-col hover:shadow-lg transition-shadow duration-300">
                                <div class="relative bg-[#f8f9fa] p-6 flex justify-center h-[200px]">
                                    <span class="absolute top-4 left-4 bg-blue-100 text-blue-900 text-xs font-semibold px-2 py-1 rounded">New Arrival</span>
                                    @if ($product->image)
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="max-h-full object-contain">
                                    @else
                                        <div class="flex items-center justify-center w-full h-full text-[#1a1a2e]/50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v8H6v-8z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="p-6 flex-1 flex flex-col">
                                    <h3 class="font-sans text-lg font-semibold text-[#1a1a2e] mb-2">{{ $product->name }}</h3>
                                    <p class="text-sm text-[#1a1a2e]/60 mb-6 leading-relaxed flex-1">{{ Str::limit($product->description, 60) }}</p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-xl font-bold text-[#1a1a2e]">${{ number_format($product->price, 2) }}</span>
                                        <button class="bg-blue-600 border-none text-white w-8 h-8 rounded flex items-center justify-center cursor-pointer transition-colors duration-150 hover:bg-blue-800">
                                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0L5 21h14"></path></svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Right Column: Essential Toners & Promo Banner --}}
                <div class="flex flex-col gap-6 lg:col-span-1">
                    {{-- Essential Toners --}}
                    <div class="bg-white border border-[#1a1a2e]/10 rounded-xl p-6 hover:shadow-lg transition-shadow duration-300">
                        <h2 class="font-sans text-xl font-semibold text-[#1a1a2e] mb-6">Essential Toners</h2>
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between pb-4 border-b border-[#f8f9fa]">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-[#f8f9fa] rounded flex items-center justify-center text-[#1a1a2e]/50">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-[#1a1a2e]">High-Yield Black (TN-450)</div>
                                        <div class="text-sm text-[#1a1a2e]/60">$89.00</div>
                                    </div>
                                </div>
                                <button class="bg-transparent border border-[#1a1a2e]/10 text-[#1a1a2e]/50 w-6 h-6 rounded-full flex items-center justify-center cursor-pointer hover:bg-gray-100 hover:text-[#1a1a2e] transition-colors">+</button>
                            </div>
                            <div class="flex items-center justify-between pb-4 border-b border-[#f8f9fa]">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-[#f8f9fa] rounded flex items-center justify-center text-[#1a1a2e]/50">
                                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-[#1a1a2e]">Color Multipack (CMY)</div>
                                        <div class="text-sm text-[#1a1a2e]/60">$210.00</div>
                                    </div>
                                </div>
                                <button class="bg-transparent border border-[#1a1a2e]/10 text-[#1a1a2e]/50 w-6 h-6 rounded-full flex items-center justify-center cursor-pointer hover:bg-gray-100 hover:text-[#1a1a2e] transition-colors">+</button>
                            </div>
                        </div>
                    </div>

                    {{-- Premium Paper Banner --}}
                    <div class="bg-blue-100 border-none rounded-xl p-6 relative overflow-hidden flex flex-col justify-between hover:shadow-lg transition-shadow duration-300">
                        <h2 class="font-sans text-xl font-semibold text-blue-900 mb-2 relative z-10">Premium Paper</h2>
                        <p class="text-sm text-blue-800 leading-relaxed mb-6 relative z-10">Stock up on essential A4 & A3 sizes for crisp, professional documents.</p>
                        <a href="{{ route('collections.papers.index') }}" class="text-sm font-semibold text-blue-700 no-underline relative z-10 flex items-center gap-1 hover:text-blue-900 transition-colors">
                            Shop Paper Supplies &rarr;
                        </a>
                        <svg class="absolute -right-2.5 -bottom-2.5 w-[100px] h-[100px] text-blue-300 opacity-40 z-0" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
 @endif
