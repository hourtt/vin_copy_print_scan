{{-- HOW IT WORKS --}}
<section class="bg-white py-8 pb-20">
    <div class="max-w-[1200px] mx-auto px-4 md:px-8">
        <div class="text-center mb-1">
            <p class="inline-block font-bold tracking-[0.12em] uppercase text-blue-600 text-sm mb-3">
                Simple process
            </p>
        </div>
        <h2 class="font-sans font-bold text-center mx-auto max-w-[400px] text-[clamp(2rem,4vw,3rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-12">
            Order in four easy steps
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-0 relative">
            {{-- Connecting line (desktop only) --}}
            <div class="hidden lg:block absolute top-7 left-[12.5%] right-[12.5%] h-px bg-[#1a1a2e]/10 z-0"></div>

            @php
                $steps = [
                    ['num' => '01', 'title' => 'Choose a product you wish to order', 'desc' => 'Browse our lineup and pick the model that fits your volume and quality needs.'],
                    ['num' => '02', 'title' => 'Order', 'desc' => 'Navigate to the order section and select your desired options.'],
                    ['num' => '03', 'title' => 'Waiting for processing', 'desc' => 'Your order will be processed and prepared for pickup or delivery.'],
                    ['num' => '04', 'title' => 'Pick up or deliver', 'desc' => 'Collect in-store or have your order dispatched often within the same business day.'],
                ];
            @endphp

            @foreach ($steps as $step)
                <div class="flex flex-col items-center text-center px-5 relative z-10 group">
                    <div class="w-14 h-14 rounded-full bg-white border border-[#1a1a2e]/15 flex items-center justify-center font-['Inter',sans-serif] text-lg font-bold text-blue-600 mb-5 group-hover:bg-blue-600 group-hover:border-blue-600 group-hover:text-white transition-all duration-200">
                        {{ $step['num'] }}
                    </div>
                    <h4 class="font-['Inter',sans-serif] text-[1.05rem] font-semibold text-[#1a1a2e] mb-1">
                        {{ $step['title'] }}
                    </h4>
                    <p class="text-sm text-[#1a1a2e]/55 leading-relaxed">
                        {{ $step['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
