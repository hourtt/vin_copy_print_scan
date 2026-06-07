<section class="products-section" id="products">
    <div class="container">
        <div class="products-header">
            <p class="section-label">What we sell</p>
            <h2 class="section-title">Hardware &amp; consumables<br>ready to take home.</h2>
            <p class="section-body">Browse our full catalog online or visit our showroom to see every model working
                live before you buy.</p>
        </div>

        <div class="product-blocks">

            {{--  Printers  --}}
            <div class="product-block">
                <div class="pb-visual ink-bg">
                    <div class="pb-visual-deco"
                        style="width:320px;height:320px;background:var(--brand);top:-80px;right:-80px;"></div>
                    <div class="pb-icon-ring">
                        <div class="pb-icon-wrap teal">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v8H6v-8z" />
                            </svg>
                        </div>
                    </div>
                    <span class="pb-badge light">Laser · Inkjet · All-in-one</span>
                </div>
                <div class="pb-content">
                    <span class="pb-tag">01 — Printers</span>
                    <h2>The right printer<br>for every need.</h2>
                    <p>From compact home printers to high-volume office workhorses, our lineup covers every use case
                        with expert advice to match you to the perfect model.</p>
                    <div class="spec-list">
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>Home &amp; SOHO</strong> compact laser and
                                inkjet models from leading brands</span>
                        </div>
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>Office &amp; workgroup</strong> high-speed
                                duplex printers with network connectivity</span>
                        </div>
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>All-in-one</strong> print, scan, copy, and
                                fax in a single machine</span>
                        </div>
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>Large format</strong> A3 and beyond for
                                posters, plans, and banners</span>
                        </div>
                    </div>
                    <div class="pb-cta-row">
                        <a href="{{ route('collections.printers.index') }}" class="btn-primary">
                            Browse printers
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{--  Toner  --}}
            <div class="product-block reverse">
                <div class="pb-visual brand-bg">
                    <div class="pb-visual-deco"
                        style="width:280px;height:280px;background:var(--brand-mid);bottom:-60px;left:-60px;"></div>
                    <div class="pb-icon-ring">
                        <div class="pb-icon-wrap coral">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                    </div>
                    <span class="pb-badge light">OEM &amp; Compatible</span>
                </div>
                <div class="pb-content">
                    <span class="pb-tag">02 — Toner &amp; Ink</span>
                    <h2>Keep printing<br>without interruption.</h2>
                    <p>We stock original OEM cartridges and high-yield compatible alternatives for all major brands
                     - so you never run out at the wrong moment.</p>
                    <div class="spec-list">
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>OEM cartridges</strong> HP, Canon, Epson,
                                Brother, Samsung, Ricoh &amp; more</span>
                        </div>
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>Compatible toner</strong> quality-tested at
                                a fraction of the OEM price</span>
                        </div>
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>High-yield options</strong> print more
                                pages per cartridge, lower cost per page</span>
                        </div>
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>Same-day availability</strong> walk in or
                                order for next-day delivery</span>
                        </div>
                    </div>
                    <div class="pb-cta-row">
                        <a href="{{ route('collections.printers.index') }}" class="btn-primary">
                            Shop consumables
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            {{--  Paper  --}}
            <div class="product-block">
                <div class="pb-visual warm-bg">
                    <div class="pb-visual-deco"
                        style="width:300px;height:300px;background:var(--brand);top:-60px;right:-60px;"></div>
                    <div class="pb-icon-ring" style="border-color:rgba(0,0,0,.06);">
                        <div class="pb-icon-wrap warm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                    <span class="pb-badge dark">A5 · A4 · A3 · Custom</span>
                </div>
                <div class="pb-content">
                    <span class="pb-tag">03 - Paper &amp; Media</span>
                    <h2>Paper for every<br>print job.</h2>
                    <p>From everyday office copy paper to premium photo stock and specialty media - we carry a full
                        range of weights, finishes, and sizes.</p>
                    <div class="spec-list">
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>Copy paper</strong> - 75gsm and 80gsm reams
                                for everyday office use</span>
                        </div>
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>Premium presentation</strong> - 90–120gsm
                                bright white for professional documents</span>
                        </div>
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>Photo &amp; glossy</strong> - coated stock
                                for vivid photo and marketing prints</span>
                        </div>
                        <div class="spec-item">
                            <div class="spec-dot"></div><span><strong>Specialty media</strong> - labels, card
                                stock, transparencies, and envelopes</span>
                        </div>
                    </div>
                    <div class="pb-cta-row">
                        <a href="{{ route('collections.printers.index') }}" class="btn-primary">
                            Shop paper
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                            </svg>
                        </a>
                        <a href="#visit" class="btn-outline">Check availability in store</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
