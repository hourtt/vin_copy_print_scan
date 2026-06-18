<section class="hero-section bg-[var(--surface-warm)] py-8 px-4 md:px-8 border-b border-[var(--border)] w-full overflow-hidden">
    <div class="max-w-[1280px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16 items-center">
        <div>
            <h1
                class="font-khmer text-2xl md:text-3xl font-medium text-[#1a1a2e] leading-[1.15] tracking-[-0.02em] mb-6 text-center">
               សូមស្វាគមន៏ មកកាន់ហាងរបស់យើងខ្ញុំ
            </h1>
            <p class="font-khmer text-base md:text-lg text-[var(--ink-muted)] leading-relaxed mb-6 max-w-full md:max-w-[100%] text-center">
               ហាងយើងខ្ញុំលក់និងជួលម៉ាសុីនព្រីន, ម៉ាស៊ីនកូពី, ទឹកថ្នាំ(Ink), ធូន័រ(Toner) <br> និងក្រដាសទំហំ A4 និង A3 ក្នុងតម្លៃសមរម្យ
            </p>
            <div class="flex flex-col sm:flex-row gap-4 flex items-center justify-center">
                <a href="{{ route('product-catalog.index') }}"
                    class="flex items-center justify-center gap-2 px-6 py-3 bg-[#1a1a2e] text-white rounded-lg text-base font-semibold hover:bg-[#1a1a2e]/90 transition-colors shadow-[0_4px_16px_rgba(0,0,0,0.1)]">
                    {{ __('Shop All Products') }}
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M5 12h14"></path>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
                <a href="{{ route('product-catalog.index') }}"
                    class="flex items-center justify-center gap-2 px-6 py-3 bg-transparent border border-[#1a1a2e] text-[#1a1a2e] rounded-lg text-base font-semibold hover:bg-[#1a1a2e]/5 transition-colors">
                    {{ __('Explore Categories') }}
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                </a>
            </div>

        </div>
        <div>
            <img src="{{ asset('storage/images/modern_printer_hero.png') }}" alt="Modern Printer"
                class="w-full rounded-xl shadow-[0_12px_32px_rgba(0,0,0,0.08)]">
            {{-- Future Banner Image (Blank) --}}
            {{-- <img src="{{ asset('storage/images/blank_banner.png') }}" alt="New Banner Image" class="w-full rounded-xl shadow-[0_12px_32px_rgba(0,0,0,0.08)]"> --}}
        </div>
    </div>
</section>
