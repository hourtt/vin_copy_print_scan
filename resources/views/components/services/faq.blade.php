  <section class="faq-section" id="faq">
        <div class="container">
            <p class="section-label">Frequently asked questions</p>
            <h2 class="section-title">Got a question?<br>We've got the answer.</h2>

            <div class="faq-grid">

                {{-- Questions --}}
                <div class="faq-list" role="list">
                    @php
                        $faqs = [
                            [
                                'q' => 'Do I need to make an appointment to visit the store?',
                                'a' =>
                                    'Not at all. Walk-ins are welcome any time during opening hours. Our staff will attend to you as soon as you arrive — no booking needed.',
                            ],
                            [
                                'q' => 'Can I test a printer before buying it?',
                                'a' =>
                                    'Yes! Every model on our showroom floor is fully operational. You can bring a USB with your own file and we\'ll run a sample print so you can see the quality first-hand before making any decision.',
                            ],
                            [
                                'q' => 'How quickly can you complete a copy job?',
                                'a' =>
                                    'Most standard copy jobs — even large ones — are completed while you wait. For very high-volume runs (thousands of pages), we may ask you to leave and return within a few hours, or pre-order.',
                            ],
                            [
                                'q' => 'What paper formats do you support for copying?',
                                'a' =>
                                    'We support A5, A4, and A3 sizes. We can also scale documents up or down — for example, enlarging an A4 original to A3 or reducing it to A5 — at no additional charge.',
                            ],
                            [
                                'q' => 'Do you stock cartridges for older or less common printer models?',
                                'a' =>
                                    'We keep a wide range in stock, and can order specific models for the next business day if we don\'t have them on the shelf. Call ahead or send us a message with your printer model number and we\'ll confirm availability.',
                            ],
                            [
                                'q' => 'What is the difference between OEM and compatible toner?',
                                'a' =>
                                    'OEM (Original Equipment Manufacturer) cartridges are made by your printer\'s brand — guaranteed to be compatible and often carry a warranty. Compatible cartridges are produced by third parties, rigorously tested to meet the same quality standards, but at a lower price per page. We can advise which suits your use case.',
                            ],
                            [
                                'q' => 'Do you offer bulk discounts on copies or products?',
                                'a' =>
                                    'Yes. Copy jobs of 50 or more pages receive an automatic per-page discount. For larger paper or consumable orders, ask one of our staff for a volume quote.',
                            ],
                        ];
                    @endphp

                    @foreach ($faqs as $faq)
                        <div class="faq-item" role="listitem">
                            <button class="faq-q" onclick="toggleFaq(this)" aria-expanded="false">
                                <span>{{ $faq['q'] }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </button>
                            <div class="faq-a" role="region">{{ $faq['a'] }}</div>
                        </div>
                    @endforeach
                </div>

                {{-- Contact card --}}
                <div class="faq-contact">
                    <h3>Still have a question?</h3>
                    <p>Our team is happy to help — whether you need product advice, a quote for a copy job, or just want
                        to check stock availability.</p>
                    <div class="contact-row">
                        <a href="tel:+85512345678" class="contact-link">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div>
                                <span>+855 12 345 678</span>
                                <small>Mon–Sat, 8 AM – 6 PM</small>
                            </div>
                        </a>
                        <a href="mailto:hello@printco.com" class="contact-link">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <span>hello@printco.com</span>
                                <small>We reply within 4 hours</small>
                            </div>
                        </a>
                        <a href="#visit" class="contact-link">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <span>Visit our showroom</span>
                                <small>123 Printer Street, Phnom Penh</small>
                            </div>
                        </a>
                    </div>
                    <a href="{{ route('login') }}" class="btn-full">Create a free account →</a>
                </div>

            </div>
        </div>
    </section>