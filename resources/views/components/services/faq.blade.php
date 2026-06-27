<section class="py-20 bg-[#f8f9fa] font-['Kantumruy_Pro',sans-serif]" id="faq">
    <div class="max-w-[1200px] mx-auto px-4 md:px-8">
        <p class="inline-block text-[#305CDE] text-lg mb-4">សំណួរដែលសួរញឹកញាប់</p>
        <h2 class="font-sans text-[clamp(2rem,4vw,3rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-14">
            មានចម្ងល់មែនទេ?<br>ពួកយើងអាចឆ្លើយជូនបាន
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_360px] gap-10 items-start">
            {{-- FAQ list --}}
            <div class="flex flex-col divide-y divide-[#e8ede9]" role="list">
                @php
                    $faqs = [
                        [
                            'q' => 'តើខ្ញុំចាំបាច់ត្រូវកក់ការណាត់ជួបមុនពេលមកកាន់ហាងដែរឬទេ?',
                            'a' =>
                                'មិនចាំបាច់ទេ, អ្នកអាចអញ្ជើញមកដោយផ្ទាល់នៅរៀងរាល់ម៉ោងធ្វើការ។',
                        ],
                        [
                            'q' => 'តើខ្ញុំអាចសាកល្បងម៉ាស៊ីនបោះពុម្ពមុនពេលទិញវាបានទេ?',
                            'a' =>
                                'បាទ/ចាស! គ្រប់ម៉ូដែលទាំងអស់នៅក្នុងបន្ទប់តាំងបង្ហាញរបស់យើងគឺអាចដំណើរការបាន។ អ្នកអាចយក USB ដែលមានឯកសាររបស់អ្នកមក ហើយយើងនឹងសាកល្បងបោះពុម្ព ដើម្បីឱ្យអ្នកអាចមើលឃើញគុណភាពផ្ទាល់ភ្នែក មុនពេលសម្រេចចិត្ត។',
                        ],
                        [
                            'q' => 'តើអ្នកអាចបញ្ចប់ការថតចម្លងបានលឿនកម្រិតណា?',
                            'a' =>
                                'កាបញ្ចប់ការថតចម្លងបានលឿនកម្រិតណាគឺស្ថិតនៅលើលក្ខខណ្ឌនៃម៉ាស៊ីនព្រីនដែលអ្នកបានជ្រើសរើស។ សម្រាប់ការងារដែលមានទំហំធំខ្លាំង (រាប់ពាន់ទំព័រ) យើងអាចសុំឱ្យអ្នកទុកចោលសិន រួចត្រឡប់មកវិញក្នុងរយៈពេលមួយទៅពីរម៉ោង។',
                        ],
                        [
                            'q' => 'តើអ្នកគាំទ្រក្រដាសទំហំអ្វីខ្លះសម្រាប់ការថតចម្លង?',
                            'a' =>
                                'យើងគាំទ្រទំហំ A4 និង A3។ យើងក៏អាចពង្រីក ឬបង្រួមឯកសារបានផងដែរ ឧទាហរណ៍ ពង្រីកពីច្បាប់ដើម A3 ទៅជា A4។',
                        ],
                        [
                            'q' =>
                                'តើអ្នកមានស្តុកទឹកថ្នាំសម្រាប់ម៉ាស៊ីនបោះពុម្ពស៊េរីចាស់ៗ ឬម៉ូដែលមិនសូវមានអ្នកប្រើដែរឬទេ?',
                            'a' =>
                                'យើងរក្សាស្តុកជាច្រើនប្រភេទ ហើយអាចបញ្ជាទិញម៉ូដែលជាក់លាក់សម្រាប់ថ្ងៃធ្វើការបន្ទាប់ ប្រសិនបើយើងមិនមានវានៅក្នុងស្តុក។ សូមទំនាក់ទំនងទូរស័ព្ទមកមុន ឬផ្ញើសារមកយើងនូវលេខម៉ូដែលម៉ាស៊ីនបោះពុម្ពរបស់អ្នក ហើយយើងនឹងឆែកមើលទៅលើស្តុកនៃទឹកថ្នាំរបស់ម៉ូដែលម៉ាស៊ីនលោកអ្នក។',
                        ],
                        [
                            'q' => 'តើអ្វីជាភាពខុសគ្នារវាងទឹកថ្នាំ OEM និងទឹកថ្នាំដែលអាចប្រើជំនួសបាន?',
                            'a' =>
                                'ប្រអប់ទឹកថ្នាំ OEM (Original Equipment Manufacturer ឬហៅបានម្យ៉ាងទៀតថាជាទឹកថ្នាំដែលចេញពីរោងចក្រផ្ទាល់របស់ម៉ាស៊ីនបោះពុម្ព) ត្រូវបានផលិតដោយក្រុមហ៊ុនម៉ាស៊ីនបោះពុម្ពផ្ទាល់ ធានាបាននូវភាពស៊ីមេទ្រីគ្នា និងជារឿយៗមានការធានា។ ប្រអប់ទឹកថ្នាំដែលអាចប្រើជំនួសបាន ត្រូវបានផលិតដោយភាគីទីបី ឆ្លងកាត់ការសាកល្បងយ៉ាងតឹងរ៉ឹងដើម្បីបំពេញស្តង់ដារគុណភាពដូចគ្នា ប៉ុន្តែមានតម្លៃទាបជាងOEMបន្តិច។ អ្វីដែលសំខាន់នោះគឺថាតើជម្រើសមួយណាស័ក្តិសមនឹងការប្រើប្រាស់របស់អ្នក។',
                        ],
                        [
                            'q' => 'តើអ្នកមានការបញ្ចុះតម្លៃសម្រាប់ការថតចម្លង ឬផលិតផលក្នុងបរិមាណច្រើនដែរឬទេ?',
                            'a' =>
                                'មាន, ការថតចម្លងចាប់ពី ៥០ ច្បាប់ឡើងទៅនឹងទទួលបានការបញ្ចុះតម្លៃ។ សម្រាប់ការបញ្ជាទិញក្រដាស ឬសម្ភារៈប្រើប្រាស់ធំៗ សូមសាកសួរអំពីការបញ្ចុះតម្លៃទៅកាន់បុគ្គលិកយើងខ្ញុំ។',
                        ],
                    ];
                @endphp
                @foreach ($faqs as $faq)
                    <div class="faq-item py-5 border-b border-[#e8ede9] last:border-0" role="listitem"
                        x-data="{ open: false }">
                        <button
                            class="faq-q w-full flex items-center justify-between gap-4 text-left text-[#1a1a2e] text-[0.95rem] hover:text-[#305CDE] transition-colors duration-200"
                            @click="open = !open" :aria-expanded="open.toString()">
                            <span>{{ $faq['q'] }}</span>
                            <svg class="w-5 h-5 flex-shrink-0 text-[#305CDE] transition-transform duration-300"
                                :class="open ? 'rotate-45' : ''" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                        <div class="grid transition-all duration-300 ease-in-out"
                            :class="open ? 'grid-rows-[1fr] opacity-100 mt-3' : 'grid-rows-[0fr] opacity-0 mt-0'">
                            <div class="faq-a text-sm text-[#1a1a2e]/60 leading-relaxed overflow-hidden" role="region">
                                {{ $faq['a'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Contact card --}}
            <div class="bg-white rounded-2xl border border-[#e8ede9] p-8 sticky top-24">
                <h3 class="font-sans text-xl text-[#1a1a2e] mb-3">នៅមានចម្ងល់មែនទេ?</h3>
                <p class="text-sm text-[#1a1a2e]/60 leading-relaxed mb-6">ក្រុមការងាររបស់យើងរីករាយក្នុងការជួយ -
                    មិនថាអ្នកត្រូវការការប្រឹក្សាពីផលិតផល ការប៉ាន់ស្មានតម្លៃសម្រាប់ការថតចម្លង
                    ឬគ្រាន់តែចង់ឆែកមើលស្តុកទំនិញ។</p>
                <div class="flex flex-col gap-4">
                    <a href="tel:+855 15 693 334"
                        class="flex items-center gap-3 p-3 rounded-xl border border-[#e8ede9] hover:border-[#305CDE] hover:bg-[#f0faf4] transition-all duration-200">
                        <svg class="w-5 h-5 flex-shrink-0 stroke-[#305CDE] stroke-[1.8]"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <div>
                            <span class="block text-sm font-semibold text-[#1a1a2e]">+855 15 693 334</span>
                            <small class="text-xs text-[#1a1a2e]/50">ច័ន្ទ - សៅរ៍, ៨:០០ ព្រឹក - ៦:០០ ល្ងាច</small>
                        </div>
                    </a>
                    <a href="mailto:vincopy168@gmail.com"
                        class="flex items-center gap-3 p-3 rounded-xl border border-[#e8ede9] hover:border-[#305CDE] hover:bg-[#f0faf4] transition-all duration-200">
                        <svg class="w-5 h-5 flex-shrink-0 stroke-[#305CDE] stroke-[1.8]"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <div>
                            <span class="block text-sm font-semibold text-[#1a1a2e]">vincopy168@gmail.com</span>
                            <small class="text-xs text-[#1a1a2e]/50">យើងនឹងឆ្លើយតបក្នុងរយៈពេល ៤ ម៉ោង</small>
                        </div>
                    </a>
                    <a href="#visit"
                        class="flex items-center gap-3 p-3 rounded-xl border border-[#e8ede9] hover:border-[#305CDE] hover:bg-[#f0faf4] transition-all duration-200">
                        <svg class="w-5 h-5 flex-shrink-0 stroke-[#305CDE] stroke-[1.8]"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <div>
                            <span class="block text-sm font-semibold text-[#1a1a2e]">មកកាន់បន្ទប់តាំងរបស់យើងខ្ញុំ</span>
                            <small class="text-xs text-[#1a1a2e]/50">ក្រុងព្រះសីហនុ, ខេត្តព្រះសីហនុ,​ កម្ពុជា</small>
                        </div>
                    </a>
                </div>
                <a href="{{ route('login') }}"
                    class="mt-6 w-full inline-flex items-center justify-center px-6 py-3 bg-[#1a1a2e] text-white text-sm font-semibold rounded-xl hover:bg-[#2d2d4e] transition-colors duration-200">
                    បង្កើតគណនីដោយឥតគិតថ្លៃ
                </a>
            </div>
        </div>
    </div>
</section>
