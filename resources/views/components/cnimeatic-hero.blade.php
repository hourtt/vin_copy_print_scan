<section class="hero" aria-label="Welcome to Vin Copy Print Scan">
    <div class="hero-canvas" aria-hidden="true">
        <div class="hero-blob hero-blob-1"></div>
        <div class="hero-blob hero-blob-2"></div>
        <div class="hero-blob hero-blob-3"></div>
        <div class="hero-grid"></div>
    </div>

    <div class="hero-inner">
        <span class="hero-eyebrow">Professional Printing Services</span>
        <h1 class="hero-headline">
            Quality
            <em>Printes</em><br>
            Reliable Supplies.
        </h1>
        <p class="hero-sub" style="color:var(--brand-light);">
            Our Printing website offers a good selection of printers, ink cartridges, and paper. We provide an excellent
            customer service to meet all your printing needs and ensure your satisfaction. Shop with us for a seamless
            printing experience.
        </p>
        <div class="hero-cta-row">
            <a href="{{ route('collections.printers.index') }}" class="btn-primary">
                Explore Printers
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                </svg>
            </a>
            <a href="#services" class="btn-ghost">
                Our Services
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
        </div>
    </div>

    {{-- Animated stats --}}
    <div class="hero-stats" aria-hidden="true">
        <div class="hero-stat">
            <div class="num">2k+</div>
            <div class="lbl">Printers, Toners, Papers has been sold out</div>
        </div>
        <div class="hero-stat">
            <div class="num">24 Hours / 6 Day </div>
            <div class="lbl">Supports</div>
        </div>
        <div class="hero-stat">
            <div class="num">95%</div>
            <div class="lbl">Satisfaction</div>
        </div>
    </div>

    <div class="hero-scroll" aria-hidden="true">
        <div class="scroll-dot"></div>
        <div class="scroll-line"></div>
        <span>Scroll to explore</span>
    </div>

</section>
