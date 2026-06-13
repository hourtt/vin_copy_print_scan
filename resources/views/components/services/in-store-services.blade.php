<section class="py-20 bg-[#f8f9fa]" id="instore">
    <div class="max-w-[1200px] mx-auto px-4 md:px-8">
        <p class="font-bold tracking-[0.12em] uppercase text-[#4a7c59] text-sm mb-3">Come in & we'll handle it</p>
        <h2 class="font-sans font-bold text-[clamp(2rem,4vw,3rem)] text-[#1a1a2e] tracking-tight leading-[1.15] max-w-[520px] mb-4">In-store services</h2>
        <p class="text-[#1a1a2e]/60 text-base leading-relaxed max-w-lg mb-14">No need to own a printer. Walk in and we'll take care of it — from a single page to a full bulk run.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Copy & Duplication --}}
            <div class="bg-white rounded-2xl border border-[#e8ede9] p-8 flex flex-col hover:shadow-md transition-shadow duration-200">
                <div class="mb-6">
                    <div class="w-12 h-12 rounded-xl bg-[#d1fae5] flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 stroke-[#065f46] stroke-[1.8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-sans text-xl font-bold text-[#1a1a2e] mb-2">Copy & Duplication</h3>
                    <p class="text-[#1a1a2e]/60 text-sm leading-relaxed">Need copies fast? Walk in with your original and we'll duplicate it — in black-and-white or full color, any quantity from 1 to 10,000.</p>
                </div>
                <ul class="flex flex-col gap-3 flex-1" aria-label="Copy service details">
                    @foreach(['Black-and-white and full-color copying', 'A5, A4, A3 — scaled up or down to fit', 'Double-sided (duplex) at no extra charge', 'Bulk discounts on orders of 50+ copies', 'Walk-in or pre-order for rush jobs'] as $item)
                        <li class="flex items-start gap-3 text-sm text-[#1a1a2e]/75">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0 stroke-[#4a7c59] stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
                <div class="mt-6 pt-5 border-t border-[#e8ede9]">
                    <a href="#visit" class="inline-flex items-center gap-2 text-[#1a1a2e] font-semibold text-sm hover:gap-3 transition-all duration-200">
                        Come in today
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" /></svg>
                    </a>
                </div>
            </div>

            {{-- Try Before You Buy --}}
            <div class="bg-white rounded-2xl border border-[#e8ede9] p-8 flex flex-col hover:shadow-md transition-shadow duration-200">
                <div class="mb-6">
                    <div class="w-12 h-12 rounded-xl bg-[#fee2d5] flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 stroke-[#9a3412] stroke-[1.8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="font-sans text-xl font-bold text-[#1a1a2e] mb-2">Try Before You Buy</h3>
                    <p class="text-[#1a1a2e]/60 text-sm leading-relaxed">Not sure which printer is right for you? Visit our showroom and test any model in person. Our staff will run sample prints so you can judge quality first-hand.</p>
                </div>
                <ul class="flex flex-col gap-3 flex-1" aria-label="Try before you buy details">
                    @foreach(['Live demonstration of every floor model', 'Bring your own file — we\'ll print a test page', 'Side-by-side quality comparison on request', 'Expert advice matched to your print volume', 'No appointment needed — just walk in'] as $item)
                        <li class="flex items-start gap-3 text-sm text-[#1a1a2e]/75">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0 stroke-[#4a7c59] stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
                <div class="mt-6 pt-5 border-t border-[#e8ede9]">
                    <a href="#visit" class="inline-flex items-center gap-2 text-[#1a1a2e] font-semibold text-sm hover:gap-3 transition-all duration-200">
                        Find our showroom
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" /></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>