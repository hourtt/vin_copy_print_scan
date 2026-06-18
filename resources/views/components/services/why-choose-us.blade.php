{{-- WHY CHOOSE US --}}
<section class="relative py-24 bg-[#1a1a2e] overflow-hidden" id="why">
    {{-- Decorative blobs (kept as CSS-in-HTML since they are purely decorative) --}}
    <div class="absolute w-96 h-96 rounded-full bg-[#4a7c59] opacity-10 -top-24 -left-24 blur-3xl pointer-events-none"
        aria-hidden="true"></div>
    <div class="absolute w-72 h-72 rounded-full bg-[#d85a30] opacity-5 bottom-0 right-0 blur-3xl pointer-events-none"
        aria-hidden="true"></div>

    <div class="relative z-10 max-w-[1200px] mx-auto px-4 md:px-8">
        <p class="font-bold tracking-[0.12em] uppercase text-[#9fe1cb] text-sm mb-3">Why Vin Copy Print Scan</p>
        <h2
            class="font-sans font-bold text-[clamp(2rem,4vw,3rem)] text-white tracking-tight leading-[1.15] max-w-[520px] mb-14">
            Printing done right,<br>every single time.
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $reasons = [
                    [
                        'num' => '01',
                        'title' => 'Hands-on expertise',
                        'desc' =>
                            'Our staff know printing inside-out. We help you choose the right machine, the right consumables, and the right paper the first time.',
                    ],
                    [
                        'num' => '02',
                        'title' => 'Fast in-store service',
                        'desc' =>
                            'Walk in with your document and walk out with your copies. No waiting days. Most in-store jobs are completed while you wait.',
                    ],
                    [
                        'num' => '03',
                        'title' => 'Quality guaranteed',
                        'desc' =>
                            'Every print job leaves sharp, clean, and true to your original. If something isn\'t right, we fix it immediately with no extra cost.',
                    ],
                    [
                        'num' => '04',
                        'title' => 'Genuine & compatible stock',
                        'desc' =>
                            'We carry OEM cartridges alongside quality-tested compatibles, so you can choose performance or value with full confidence in either.',
                    ],
                    [
                        'num' => '05',
                        'title' => 'Try before you buy',
                        'desc' =>
                            'Every floor model is live. Bring your own file, test the print quality in person, and buy only when you\'re fully satisfied.',
                    ],
                    [
                        'num' => '06',
                        'title' => 'Transparent pricing',
                        'desc' =>
                            'No surprises. Per-page copy rates and product prices are clearly listed. Bulk discounts apply automatically no haggling required.',
                    ],
                ];
            @endphp

            @foreach ($reasons as $reason)
                <div class="group">
                    <div
                        class="text-3xl font-bold text-white/10 font-['Fraunces',serif] mb-4 group-hover:text-[#ffffff] transition-colors duration-300">
                        {{ $reason['num'] }}
                    </div>
                    <h3 class="text-white font-semibold text-lg mb-2">{{ $reason['title'] }}</h3>
                    <p class="text-white/50 text-sm leading-relaxed">{{ $reason['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
