<section class="py-20 bg-white" id="products">
    <div class="max-w-[1200px] mx-auto px-4 md:px-8">

        {{-- Section header --}}
        <div class="mb-16">
            <p class="font-bold tracking-[0.12em] uppercase text-[#4a7c59] text-sm mb-3">What we sell</p>
            <h2 class="font-sans font-bold text-[clamp(2rem,4vw,3rem)] text-[#1a1a2e] tracking-tight leading-[1.15] max-w-[520px] mb-4">
                Hardware & consumables<br>ready to take home.
            </h2>
            <p class="text-[#1a1a2e]/60 text-base leading-relaxed max-w-lg">
                Browse our full catalog online or visit our showroom to see every model working live before you buy.
            </p>
        </div>

        <div class="flex flex-col gap-24">

            {{-- Printers --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Visual --}}
                <div class="relative bg-[#1a1a2e] rounded-3xl p-12 flex items-center justify-center min-h-[320px] overflow-hidden">
                    <div class="absolute w-80 h-80 rounded-full bg-[#4a7c59] opacity-10 -top-20 -right-20"></div>
                    <div class="relative z-10 flex flex-col items-center gap-5">
                        <div class="w-20 h-20 rounded-2xl bg-[#4a7c59]/20 flex items-center justify-center">
                            <svg class="w-10 h-10 stroke-[#9fe1cb] stroke-[1.6]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v8H6v-8z" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/50">Laser · Inkjet · All-in-one</span>
                    </div>
                </div>
                {{-- Content --}}
                <div>
                    <span class="text-xs font-bold tracking-[0.12em] uppercase text-[#4a7c59] mb-3 block">01 — Printers</span>
                    <h2 class="font-sans font-bold text-[clamp(1.8rem,3.5vw,2.5rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-4">The right printer<br>for every need.</h2>
                    <p class="text-[#1a1a2e]/60 text-base leading-relaxed mb-6">From compact home printers to high-volume office workhorses, our lineup covers every use case with expert advice to match you to the perfect model.</p>
                    <ul class="flex flex-col gap-3 mb-8">
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>Home & SOHO</strong> compact laser and inkjet models from leading brands</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>Office & workgroup</strong> high-speed duplex printers with network connectivity</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>All-in-one</strong> print, scan, copy, and fax in a single machine</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>Large format</strong> A3 and beyond for posters, plans, and banners</span></li>
                    </ul>
                    <a href="{{ route('collections.printers.index') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-[#1a1a2e] text-white text-sm font-semibold rounded-xl hover:bg-[#2d2d4e] transition-colors duration-200">
                        Browse printers
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" /></svg>
                    </a>
                </div>
            </div>

            {{-- Toner & Ink (reversed) --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Content (order-2 on lg, default on mobile) --}}
                <div class="lg:order-1 order-2">
                    <span class="text-xs font-bold tracking-[0.12em] uppercase text-[#4a7c59] mb-3 block">02 — Toner & Ink</span>
                    <h2 class="font-sans font-bold text-[clamp(1.8rem,3.5vw,2.5rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-4">Keep printing<br>without interruption.</h2>
                    <p class="text-[#1a1a2e]/60 text-base leading-relaxed mb-6">We stock original OEM cartridges and high-yield compatible alternatives for all major brands - so you never run out at the wrong moment.</p>
                    <ul class="flex flex-col gap-3 mb-8">
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>OEM cartridges</strong> HP, Canon, Epson, Brother, Samsung, Ricoh & more</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>Compatible toner</strong> quality-tested at a fraction of the OEM price</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>High-yield options</strong> print more pages per cartridge, lower cost per page</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>Same-day availability</strong> walk in or order for next-day delivery</span></li>
                    </ul>
                    <a href="{{ route('collections.toners.index') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-[#1a1a2e] text-white text-sm font-semibold rounded-xl hover:bg-[#2d2d4e] transition-colors duration-200">
                        Shop consumables
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" /></svg>
                    </a>
                </div>
                {{-- Visual --}}
                <div class="relative bg-[#4a7c59] rounded-3xl p-12 flex items-center justify-center min-h-[320px] overflow-hidden lg:order-2 order-1">
                    <div class="absolute w-72 h-72 rounded-full bg-[#2a5a3a] opacity-40 -bottom-16 -left-16"></div>
                    <div class="relative z-10 flex flex-col items-center gap-5">
                        <div class="w-20 h-20 rounded-2xl bg-white/15 flex items-center justify-center">
                            <svg class="w-10 h-10 stroke-white/80 stroke-[1.6]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold tracking-widest uppercase text-white/60">OEM & Compatible</span>
                    </div>
                </div>
            </div>

            {{-- Paper --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Visual --}}
                <div class="relative bg-[#f5f0e8] rounded-3xl p-12 flex items-center justify-center min-h-[320px] overflow-hidden">
                    <div class="absolute w-80 h-80 rounded-full bg-[#4a7c59] opacity-10 -top-16 -right-16"></div>
                    <div class="relative z-10 flex flex-col items-center gap-5">
                        <div class="w-20 h-20 rounded-2xl bg-black/8 flex items-center justify-center">
                            <svg class="w-10 h-10 stroke-[#6b5a3e] stroke-[1.6]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="text-xs font-bold tracking-widest uppercase text-[#6b5a3e]/60">A5 · A4 · A3 · Custom</span>
                    </div>
                </div>
                {{-- Content --}}
                <div>
                    <span class="text-xs font-bold tracking-[0.12em] uppercase text-[#4a7c59] mb-3 block">03 — Paper & Media</span>
                    <h2 class="font-sans font-bold text-[clamp(1.8rem,3.5vw,2.5rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-4">Paper for every<br>print job.</h2>
                    <p class="text-[#1a1a2e]/60 text-base leading-relaxed mb-6">From everyday office copy paper to premium photo stock and specialty media - we carry a full range of weights, finishes, and sizes.</p>
                    <ul class="flex flex-col gap-3 mb-8">
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>Copy paper</strong> 75gsm and 80gsm reams for everyday office use</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>Premium presentation</strong> 90–120gsm bright white for professional documents</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>Photo & glossy</strong> coated stock for vivid photo and marketing prints</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span class="mt-1.5 w-2 h-2 rounded-full bg-[#4a7c59] flex-shrink-0"></span><span><strong>Specialty media</strong> labels, card stock, transparencies, and envelopes</span></li>
                    </ul>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('collections.papers.index') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-[#1a1a2e] text-white text-sm font-semibold rounded-xl hover:bg-[#2d2d4e] transition-colors duration-200">
                            Shop paper
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" /></svg>
                        </a>
                        <a href="#visit"
                            class="inline-flex items-center gap-2 px-6 py-3 border border-[#1a1a2e]/20 text-[#1a1a2e] text-sm font-semibold rounded-xl hover:bg-[#f8f9fa] transition-colors duration-200">
                            Check availability in store
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
