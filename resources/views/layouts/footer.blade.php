<footer class="shop-footer">
    <div class="footer-container">

        {{-- Column 1: Brand & About --}}
        <div class="footer-col brand-col">
            <a href="{{ url('/') }}" class="footer-logo">
                {{ config('app.name', 'Vin Copy Print Scan') }}
            </a>
            <p class="footer-desc">
                Here, our printing shop and website. We are committed to providing high-quality printing services and products to meet all your needs. Thanks you for choosing us for your printing needs!
            </p>
            <div class="social-links">
                {{-- Add social SVGs here if needed --}}
            </div>
        </div>

     
        {{-- Column 3: Contact & Location --}}
        <div class="footer-col contact-col">
            <h4 class="col-title">Get in Touch with us</h4>
            <ul class="contact-list">
                <li>
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 13a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.08 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16.92z" />
                    </svg>
                    <a href="tel:+15550123456">+1 (855) 012-345-678</a>
                </li>
                <li>
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                    <a href="mailto:hello@printhub.com">hello@printhub.com</a>
                </li>
            </ul>

            <div class="location-box">
                <p>Phumi 03, Sangkat 02, Sihanoukville, Cambodia</p>
                <p class="hours">Mon–Sat: 7:30 AM – 5 PM</p>
                <a href="https://maps.app.goo.gl/1zJMBY886xnUsrWf8" target="_blank" rel="noopener noreferrer" class="btn-directions">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polygon points="3 6 9 3 15 6 21 3 21 18 15 21 9 18 3 21" />
                        <line x1="9" x2="9" y1="3" y2="18" />
                        <line x1="15" x2="15" y1="6" y2="21" />
                    </svg>
                    Get Directions
                </a>
            </div>
        </div>

    </div>

    {{-- Bottom Bar --}}
    <div class="footer-bottom">
        <div class="bottom-container">
            <p class="copyright">© {{ date('Y') }} Vin Copy Print Scan. All rights reserved.</p>
            <div class="legal-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
