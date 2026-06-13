<section class="py-20 bg-[#f8f9fa]" id="faq">
    <div class="max-w-[1200px] mx-auto px-4 md:px-8">
        <p class="font-bold tracking-[0.12em] uppercase text-[#4a7c59] text-sm mb-3">Frequently asked questions</p>
        <h2 class="font-sans font-bold text-[clamp(2rem,4vw,3rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-14">
            Got a question?<br>We've got the answer.
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-[1fr_360px] gap-10 items-start">

            {{-- FAQ list --}}
            <div class="flex flex-col divide-y divide-[#e8ede9]" role="list">
                @php
                    $faqs = [
                        ['q' => 'Do I need to make an appointment to visit the store?', 'a' => 'Not at all. Walk-ins are welcome any time during opening hours. Our staff will attend to you as soon as you arrive — no booking needed.'],
                        ['q' => 'Can I test a printer before buying it?', 'a' => 'Yes! Every model on our showroom floor is fully operational. You can bring a USB with your own file and we\'ll run a sample print so you can see the quality first-hand before making any decision.'],
                        ['q' => 'How quickly can you complete a copy job?', 'a' => 'Most standard copy jobs — even large ones — are completed while you wait. For very high-volume runs (thousands of pages), we may ask you to leave and return within a few hours, or pre-order.'],
                        ['q' => 'What paper formats do you support for copying?', 'a' => 'We support A5, A4, and A3 sizes. We can also scale documents up or down — for example, enlarging an A4 original to A3 or reducing it to A5 — at no additional charge.'],
                        ['q' => 'Do you stock cartridges for older or less common printer models?', 'a' => 'We keep a wide range in stock, and can order specific models for the next business day if we don\'t have them on the shelf. Call ahead or send us a message with your printer model number and we\'ll confirm availability.'],
                        ['q' => 'What is the difference between OEM and compatible toner?', 'a' => 'OEM (Original Equipment Manufacturer) cartridges are made by your printer\'s brand — guaranteed to be compatible and often carry a warranty. Compatible cartridges are produced by third parties, rigorously tested to meet the same quality standards, but at a lower price per page. We can advise which suits your use case.'],
                        ['q' => 'Do you offer bulk discounts on copies or products?', 'a' => 'Yes. Copy jobs of 50 or more pages receive an automatic per-page discount. For larger paper or consumable orders, ask one of our staff for a volume quote.'],
                    ];
                @endphp

                @foreach ($faqs as $faq)
                    <div class="faq-item py-5" role="listitem">
                        <button class="faq-q w-full flex items-center justify-between gap-4 text-left font-semibold text-[#1a1a2e] text-[0.95rem] hover:text-[#4a7c59] transition-colors duration-200"
                            onclick="toggleFaq(this)" aria-expanded="false">
                            <span>{{ $faq['q'] }}</span>
                            <svg class="w-5 h-5 flex-shrink-0 text-[#4a7c59]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                        <div class="faq-a hidden mt-3 text-sm text-[#1a1a2e]/60 leading-relaxed" role="region">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Contact card --}}
            <div class="bg-white rounded-2xl border border-[#e8ede9] p-8 sticky top-24">
                <h3 class="font-sans text-xl font-bold text-[#1a1a2e] mb-3">Still have a question?</h3>
                <p class="text-sm text-[#1a1a2e]/60 leading-relaxed mb-6">Our team is happy to help — whether you need product advice, a quote for a copy job, or just want to check stock availability.</p>

                <div class="flex flex-col gap-4">
                    <a href="tel:+85512345678"
                        class="flex items-center gap-3 p-3 rounded-xl border border-[#e8ede9] hover:border-[#4a7c59] hover:bg-[#f0faf4] transition-all duration-200">
                        <svg class="w-5 h-5 flex-shrink-0 stroke-[#4a7c59] stroke-[1.8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div>
                            <span class="block text-sm font-semibold text-[#1a1a2e]">+855 12 345 678</span>
                            <small class="text-xs text-[#1a1a2e]/50">Mon–Sat, 8 AM – 6 PM</small>
                        </div>
                    </a>

                    <a href="mailto:hello@printco.com"
                        class="flex items-center gap-3 p-3 rounded-xl border border-[#e8ede9] hover:border-[#4a7c59] hover:bg-[#f0faf4] transition-all duration-200">
                        <svg class="w-5 h-5 flex-shrink-0 stroke-[#4a7c59] stroke-[1.8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <span class="block text-sm font-semibold text-[#1a1a2e]">hello@printco.com</span>
                            <small class="text-xs text-[#1a1a2e]/50">We reply within 4 hours</small>
                        </div>
                    </a>

                    <a href="#visit"
                        class="flex items-center gap-3 p-3 rounded-xl border border-[#e8ede9] hover:border-[#4a7c59] hover:bg-[#f0faf4] transition-all duration-200">
                        <svg class="w-5 h-5 flex-shrink-0 stroke-[#4a7c59] stroke-[1.8]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <span class="block text-sm font-semibold text-[#1a1a2e]">Visit our showroom</span>
                            <small class="text-xs text-[#1a1a2e]/50">Sihanoukville, Cambodia</small>
                        </div>
                    </a>
                </div>

                <a href="{{ route('login') }}"
                    class="mt-6 w-full inline-flex items-center justify-center px-6 py-3 bg-[#1a1a2e] text-white text-sm font-semibold rounded-xl hover:bg-[#2d2d4e] transition-colors duration-200">
                    Create a free account →
                </a>
            </div>

        </div>
    </div>
</section>