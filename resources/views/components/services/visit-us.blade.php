<section class="py-20 bg-white font-['Kantumruy_Pro',sans-serif]" id="visit">
    <div class="max-w-[1200px] mx-auto px-4 md:px-8">
        <p class="inline-block text-[#305CDE] text-lg mb-4">ទីតាំង</p>
        <h2 class="font-sans  text-[clamp(2rem,4vw,3rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-4">
            មកកាន់ហាងរបស់យើង</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            {{-- Map --}}
            <div class="rounded-2xl overflow-hidden border border-[#e8ede9] shadow-sm aspect-[4/3]"
                aria-label="Store location map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3548.6402654448975!2d103.51843427451558!3d10.627927661916415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3107e121fb173d87%3A0x2ec5742b810d98ef!2sVIN%20COPY%20PRINT%20SCAN!5e1!3m2!1sen!2sus!4v1780200921852!5m2!1sen!2sus"
                    class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            {{-- Info cards --}}
            <div class="flex flex-col gap-5">
                {{-- Address --}}
                <div class="flex gap-4 items-start bg-[#f8f9fa] rounded-xl p-5">
                    <div
                        class="w-10 h-10 rounded-lg bg-[#e6f4ec] flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-5 h-5 stroke-[#1a6b4a] stroke-[1.8]" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-[#1a1a2e] text-sm mb-1">អាស័យដ្ឋាន</h4>
                        <p class="text-[#1a1a2e]/60 text-sm leading-relaxed">
                            ភូមិ០៣, សង្កាត់០២, ក្រុងព្រះសីហនុ, ខេត្តព្រះសីហនុ, កម្ពុជា
                        </p>
                        <a href="https://maps.app.goo.gl/7YSNCuTtMr7L79GEA" target="_blank" rel="noopener"
                            class="inline-block mt-2 text-[#305CDE] text-sm font-semibold hover:underline">
                            បើកក្នុង Google Maps
                        </a>
                    </div>
                </div>
                {{-- Opening Hours --}}
                <div class="flex gap-4 items-start bg-[#f8f9fa] rounded-xl p-5">
                    <div
                        class="w-10 h-10 rounded-lg bg-[#e6f4ec] flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-5 h-5 stroke-[#1a6b4a] stroke-[1.8]" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-[#1a1a2e] text-sm mb-3">ម៉ោងបើកដំណើរការអាជីវកម្ម</h4>
                        <table class="w-full text-sm" aria-label="Opening hours">
                            <tbody>
                                <tr class="border-b border-[#e8ede9]">
                                    <td class="py-2 text-[#1a1a2e]/60 font-medium">ច័ន្ទ-សៅរ៏</td>
                                    <td class="py-2 text-[#1a1a2e] font-semibold text-right">8:00 ព្រឹក - 5:30 ល្ងាច</td>
                                </tr>
                                <tr>
                                    <td class="py-2 text-[#1a1a2e]/60 font-medium">អាទិត្យ</td>
                                    <td class="py-2 text-red-500 font-semibold text-right">បិទ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
