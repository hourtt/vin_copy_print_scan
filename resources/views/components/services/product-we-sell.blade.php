<section class="py-20 bg-white font-['Kantumruy_Pro',sans-serif]" id="products">
    <div class="max-w-[1200px] mx-auto px-4 md:px-8">
        {{-- Section header --}}
        <div class="mb-16">
            <p class="inline-block text-[#305CDE] text-md mb-4">អ្វីដែលយើងលក់</p>
            <h2
                class="font-sans  text-[clamp(2rem,4vw,3rem)] text-[#1a1a2e] tracking-tight leading-[1.15] max-w-[520px] mb-4">
                ឧបករណ៍ និងសម្ភារៈប្រើប្រាស់<br>ត្រៀមរួចជាស្រេចសម្រាប់យកទៅផ្ទះ។
            </h2>
            <p class="text-[#1a1a2e]/60 text-base leading-relaxed max-w-lg">
                ស្វែងរកកាតាឡុកពេញលេញរបស់យើងតាមអ៊ីនធឺណិត ឬមកកាន់បន្ទប់តាំងបង្ហាញរបស់យើង
                ដើម្បីមើលម៉ូដែលនីមួយៗដំណើរការផ្ទាល់មុនពេលអ្នកទិញ។
            </p>
        </div>
        <div class="flex flex-col gap-24">
            {{-- Printers --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Visual --}}
                <div
                    class="relative bg-[#1a1a2e] rounded-3xl p-12 flex items-center justify-center min-h-[320px] overflow-hidden">
                    <div class="absolute w-80 h-80 rounded-full bg-[#305CDE] opacity-10 -top-20 -right-20"></div>
                    <div class="relative z-10 flex flex-col items-center gap-5">
                        <div class="w-20 h-20 rounded-2xl bg-[#305CDE]/20 flex items-center justify-center">
                            <svg class="w-10 h-10 stroke-[#9fe1cb] stroke-[1.6]" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v8H6v-8z" />
                            </svg>
                        </div>
                        <span class="text-xs  tracking-widest uppercase text-white/50">ឡាស៊ែរ ទឹកថ្នាំ
                            រួមបញ្ចូលគ្នា</span>
                    </div>
                </div>
                {{-- Content --}}
                <div>
                    <span class="text-xs  tracking-[0.12em] uppercase text-[#305CDE] mb-3 block">01
                        ម៉ាស៊ីនបោះពុម្ព</span>
                    <h2
                        class="font-sans  text-[clamp(1.8rem,3.5vw,2.5rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-4">
                        ម៉ាស៊ីនបោះពុម្ពដែលត្រឹមត្រូវ<br>សម្រាប់គ្រប់តម្រូវការ។</h2>
                    <p class="text-[#1a1a2e]/60 text-base leading-relaxed mb-6">
                        ពីម៉ាស៊ីនបោះពុម្ពខ្នាតតូចសម្រាប់ប្រើនៅផ្ទះ រហូតដល់ម៉ាស៊ីនប្រើប្រាស់ក្នុងការិយាល័យធំៗ
                        យើងមានជម្រើសទាំងអស់ ព្រមជាមួយដំបូន្មានពីអ្នកជំនាញ
                        ដើម្បីជួយអ្នកស្វែងរកម៉ូដែលដ៏ស័ក្តិសមបំផុត។</p>
                    <ul class="flex flex-col gap-3 mb-8">
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>សម្រាប់ផ្ទះ
                                    & ការិយាល័យតូច ម៉ូដែលឡាស៊ែរនិងទឹកថ្នាំខ្នាតតូច ពីម៉ាកល្បីៗ</span>
                        </li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>ការិយាល័យ
                                    & ក្រុមការងារ ម៉ាស៊ីនបោះពុម្ពល្បឿនលឿនសងខាង ដែលមានការភ្ជាប់បណ្តាញ</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>រួមបញ្ចូលគ្នា
                                បោះពុម្ព ស្កេន ថតចម្លង និងហ្វាក់ ក្នុងម៉ាស៊ីនតែមួយ</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>ខ្នាតធំ
                                ទំហំ A3 និងធំជាងនេះ សម្រាប់ផ្ទាំងរូបភាព ប្លង់ និងបដា</span></li>
                    </ul>
                    <a href="{{ route('collections.printers.index') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-[#1a1a2e] text-white text-sm font-semibold rounded-xl hover:bg-[#2d2d4e] transition-colors duration-200">
                        ស្វែងរកម៉ាស៊ីនបោះពុម្ព
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                        </svg>
                    </a>
                </div>
            </div>
            {{-- Toner & Ink (reversed) --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Content (order-2 on lg, default on mobile) --}}
                <div class="lg:order-1 order-2">
                    <span class="text-xs  tracking-[0.12em] uppercase text-[#305CDE] mb-3 block">02
                        ទឹកថ្នាំ</span>
                    <h2
                        class="font-sans  text-[clamp(1.8rem,3.5vw,2.5rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-4">
                        បន្តការបោះពុម្ព<br>ដោយគ្មានការរំខាន។</h2>
                    <p class="text-[#1a1a2e]/60 text-base leading-relaxed mb-6">យើងមានស្តុកប្រអប់ទឹកថ្នាំ OEM ដើម
                        និងជម្រើសទឹកថ្នាំដែលអាចប្រើជំនួសបានដែលមានទិន្នផលខ្ពស់ សម្រាប់ម៉ាកធំៗទាំងអស់ -
                        ដូច្នេះអ្នកមិនបារម្ភពីការអស់ទឹកថ្នាំខុសពេលនោះទេ។</p>
                    <ul class="flex flex-col gap-3 mb-8">
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>ប្រអប់ទឹកថ្នាំ
                                    OEM HP, Canon, Epson, Brother, Samsung, Ricoh & ច្រើនទៀត</span>
                        </li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>ទឹកថ្នាំប្រើជំនួសបាន
                                គុណភាពត្រូវបានសាកល្បងត្រឹមត្រូវ ក្នុងតម្លៃទាបជាង OEM ឆ្ងាយ</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>ជម្រើសទិន្នផលខ្ពស់
                                បោះពុម្ពបានទំព័រច្រើនជាងមុន ក្នុងតម្លៃទាបក្នុងមួយទំព័រ</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>អាចរកបានភ្លាមៗ
                                អញ្ជើញមកផ្ទាល់ ឬបញ្ជាទិញសម្រាប់ការដឹកជញ្ជូននៅថ្ងៃបន្ទាប់</span></li>
                    </ul>
                    <a href="{{ route('collections.toners.index') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-[#1a1a2e] text-white text-sm font-semibold rounded-xl hover:bg-[#2d2d4e] transition-colors duration-200">
                        ទិញសម្ភារៈប្រើប្រាស់
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                        </svg>
                    </a>
                </div>
                {{-- Visual --}}
                <div
                    class="relative bg-[#305CDE] rounded-3xl p-12 flex items-center justify-center min-h-[320px] overflow-hidden lg:order-2 order-1">
                    <div class="absolute w-72 h-72 rounded-full bg-[#2a5a3a] opacity-40 -bottom-16 -left-16"></div>
                    <div class="relative z-10 flex flex-col items-center gap-5">
                        <div class="w-20 h-20 rounded-2xl bg-white/15 flex items-center justify-center">
                            <svg class="w-10 h-10 stroke-white/80 stroke-[1.6]" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <span class="text-xs  tracking-widest uppercase text-white/60">OEM និង
                            អាចប្រើជំនួសបាន</span>
                    </div>
                </div>
            </div>
            {{-- Paper --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                {{-- Visual --}}
                <div
                    class="relative bg-[#f5f0e8] rounded-3xl p-12 flex items-center justify-center min-h-[320px] overflow-hidden">
                    <div class="absolute w-80 h-80 rounded-full bg-[#305CDE] opacity-10 -top-16 -right-16"></div>
                    <div class="relative z-10 flex flex-col items-center gap-5">
                        <div class="w-20 h-20 rounded-2xl bg-black/8 flex items-center justify-center">
                            <svg class="w-10 h-10 stroke-[#6b5a3e] stroke-[1.6]" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="text-xs  tracking-widest uppercase text-[#6b5a3e]/60">A5 A4 A3
                            តម្រូវតាមទំហំ</span>
                    </div>
                </div>
                {{-- Content --}}
                <div>
                    <span class="text-xs  tracking-[0.12em] uppercase text-[#305CDE] mb-3 block">03 ក្រដាស &
                        សម្ភារៈបោះពុម្ព</span>
                    <h2
                        class="font-sans  text-[clamp(1.8rem,3.5vw,2.5rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-4">
                        ក្រដាសសម្រាប់គ្រប់<br>ការងារបោះពុម្ព។</h2>
                    <p class="text-[#1a1a2e]/60 text-base leading-relaxed mb-6">
                        ចាប់ពីក្រដាសថតចម្លងសម្រាប់ការិយាល័យប្រចាំថ្ងៃ រហូតដល់ក្រដាសរូបថតកម្រិតខ្ពស់ និងសម្ភារៈពិសេសៗ -
                        យើងមានគ្រប់កម្រាស់ ប្រភេទផ្ទៃ និងទំហំ។</p>
                    <ul class="flex flex-col gap-3 mb-8">
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>ក្រដាសថតចម្លង
                                កម្រាស់ 75gsm និង 80gsm សម្រាប់ការប្រើប្រាស់ការិយាល័យប្រចាំថ្ងៃ</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>ក្រដាសគុណភាពខ្ពស់
                                ពណ៌សភ្លឺ 90-120gsm សម្រាប់ឯកសារផ្លូវការ</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>រូបថត
                                    & រលោង សម្រាប់បោះពុម្ពរូបថត និងទីផ្សារពណ៌រស់រវើក</span></li>
                        <li class="flex gap-3 items-start text-sm text-[#1a1a2e]/75"><span
                                class="mt-1.5 w-2 h-2 rounded-full bg-[#305CDE] flex-shrink-0"></span><span>សម្ភារៈពិសេស
                                ស្លាក, កាត, ក្រដាសថ្លា, និងស្រោមសំបុត្រ</span></li>
                    </ul>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('collections.papers.index') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-[#1a1a2e] text-white text-sm font-semibold rounded-xl hover:bg-[#2d2d4e] transition-colors duration-200">
                            ទិញក្រដាស
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                            </svg>
                        </a>
                        <a href="#visit"
                            class="inline-flex items-center gap-2 px-6 py-3 border border-[#1a1a2e]/20 text-[#1a1a2e] text-sm font-semibold rounded-xl hover:bg-[#f8f9fa] transition-colors duration-200">
                            ឆែកមើលចំនួនក្នុងហាង
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
