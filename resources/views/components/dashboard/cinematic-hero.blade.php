<section class="w-full overflow-hidden bg-[#F5F5F3]">
    <div class="max-w-[1280px] mx-auto px-6 md:px-12 lg:px-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-0 md:gap-12 lg:gap-20 items-center min-h-[82vh] md:min-h-[78vh]">

            {{-- LEFT COLUMN: Text block  --}}
            <div class="flex flex-col justify-center py-16 md:py-0 order-2 md:order-1">

                {{-- Khmer Display headline --}}
                <h4
                    class="mt-6 mb-6 leading-[1.08] tracking-[-0.03em] font-['Kantumruy_Pro',serif] text-[clamp(2.6rem,5.5vw,4.25rem)] font-semibold text-[#0D0D0B]">
                    ស្វាគមន៏មកកាន់ហាង<br>
                    <em class="italic font-normal text-[clamp(1.8rem,4vw,3rem)]">
                        Vin Copy Print Scan
                    </em>
                </h4>

                {{-- Khmer subtitle --}}
                <p
                    class="mb-10 max-w-md leading-relaxedfont-['Kantumruy_Pro',sans-serif] text-[1.0625rem] text-[#6B6B6B]">
                    ហាងយើងខ្ញុំមានលក់និងជួលម៉ាសុីនព្រីន, ម៉ាស៊ីនកូពី, ទឹកថ្នាំ &amp; ធូន័រ​ ក្នុងតម្លៃសមរម្យ។
                </p>

                {{-- English subtitle --}}
                <p class="mb-10 text-sm leading-relaxed -mt-4 text-[#9A9A96] font-['DM_Sans',sans-serif] ">
                    We sell and rent printers, copiers, toners, ink cartridges, and A4/A3 paper at affordable prices.
                </p>

                {{-- CTA row --}}
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('services') }}"
                        class="inline-flex items-center gap-1 text-sm font-medium transition-colors duration-200 text-[#0D0D0B] font-['DM_Sans',sans-serif] hover:text-[#305CDE]">
                        Our Services
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M5 12h14" />
                            <polyline points="12 5 19 12 12 19" />
                        </svg>
                    </a>
                </div>

                {{-- Trust micro-copy --}}
                <div class="mt-12 flex items-center gap-6">
                    <div class="font-['DM_Sans',sans-serif]">
                        <div class="text-xs font-bold text-[#0D0D0B]">High Quality Printing</div>
                        <div class="text-xs text-[#9A9A96]">OEM &amp; Compatible Cartridges</div>
                    </div>
                    <div class="w-px h-8 bg-[#DDDDD8]"></div>
                    <div class="font-['DM_Sans',sans-serif]">
                        <div class="text-xs font-bold text-[#0D0D0B]">Rental plans</div>
                        <div class="text-xs text-[#9A9A96]">Flexible terms</div>
                    </div>
                </div>

            </div>

            {{--  RIGHT COLUMN: Frameless image  --}}
            <div class="relative flex items-center justify-center order-1 md:order-2 pt-10 md:pt-0" aria-hidden="true">
                {{-- Large faint circle — purely decorative breath of colour --}}
                <div
                    class="absolute inset-0 m-auto rounded-full pointer-events-none w-[85%] aspect-square bg-[radial-gradient(circle,rgba(45,122,106,0.07)_0%,transparent_70%)] blur-[2px]">
                </div>
                {{-- The image — no card, no border, no shadow --}}
                <img src="{{ asset('storage/images/modern_printer_hero.webp') }}"
                    alt="Modern Canon printer on a clean desk"
                    class="relative w-full max-w-[520px] drop-shadow-none max-h-[68vh] object-contain mix-blend-multiply rounded-md"
                    loading="eager">
            </div>
        </div>
    </div>

    {{-- Hairline bottom rule --}}
    <div class="border-t border-[#E5E5E2] mt-0"></div>
</section>
