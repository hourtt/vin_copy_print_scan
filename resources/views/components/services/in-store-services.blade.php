<section class="py-20 bg-[#f8f9fa] font-['Kantumruy_Pro',sans-serif]" id="instore">
    <div class="max-w-[1200px] mx-auto px-4 md:px-8">
        <p class="inline-block text-[#305CDE] text-lg mb-4">អញ្ជើញមកកាន់ហាង ហើយយើងនឹងរៀបចំជូន</p>
        <h2
            class="font-sans text-[clamp(2rem,4vw,3rem)] text-[#1a1a2e] tracking-tight leading-[1.15] max-w-[520px] mb-4">
            សេវាកម្មក្នុងហាង</h2>
        <p class="text-[#1a1a2e]/60 text-base leading-relaxed max-w-lg mb-14">
            លែងព្រួយបារម្ភពីការមិនមានម៉ាស៊ីនបោះពុម្ពខ្លួនឯងនោះទៀតទៅ។ គ្រាន់តែអញ្ជើញមកកាន់ហាងយើងខ្ញុំ
            នោះយើងខ្ញុំនឹងរៀបចំជូនលោកអ្នក។
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Copy & Duplication --}}
            <div
                class="bg-white rounded-2xl border border-[#e8ede9] p-8 flex flex-col hover:shadow-md transition-shadow duration-200">
                <div class="mb-6">
                    <div class="w-12 h-12 rounded-xl bg-[#d1fae5] flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 stroke-[#065f46] stroke-[1.8]" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-sans text-xl font-bold text-[#1a1a2e] mb-2">ការថតចម្លង និងបោះពុម្ព</h3>
                    <p class="text-[#1a1a2e]/60 text-sm leading-relaxed">ត្រូវការចម្លងជាបន្ទាន់មែនទេ?
                        យកច្បាប់ដើមរបស់អ្នកមក យើងនឹងថតចម្លងជូនជាសខ្មៅ ឬកូល័រ ចាប់ពី ១ ដល់ ១០០០សន្លឹក។</p>
                </div>
                <ul class="flex flex-col gap-3 flex-1" aria-label="Copy service details">
                    @foreach (['ការថតចម្លងស-ខ្មៅ និងពណ៌ពេញ', 'ទំហំ A4, A3 ពង្រីកឬបង្រួមតាមតម្រូវការ', 'ថតចម្លងសងខាង (Duplex) ដោយមិនគិតថ្លៃបន្ថែម', 'បញ្ចុះតម្លៃសម្រាប់ការបញ្ជាទិញចាប់ពី ៥០០ សន្លឹកឡើងទៅ', 'មកផ្ទាល់ឬទំនាក់ទំនងប្រាប់ទុកមុនសម្រាប់ការងារប្រញាប់'] as $item)
                        <li class="flex items-start gap-3 text-sm text-[#1a1a2e]/75">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0 stroke-[#305CDE] stroke-2"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
                <div class="mt-6 pt-5 border-t border-[#e8ede9]">
                    <a href="#visit"
                        class="inline-flex items-center gap-2 text-[#1a1a2e] font-semibold text-sm hover:gap-3 transition-all duration-200">
                        អញ្ជើញមកថ្ងៃនេះ
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                        </svg>
                    </a>
                </div>
            </div>
            {{-- Try Before You Buy --}}
            <div
                class="bg-white rounded-2xl border border-[#e8ede9] p-8 flex flex-col hover:shadow-md transition-shadow duration-200">
                <div class="mb-6">
                    <div class="w-12 h-12 rounded-xl bg-[#fee2d5] flex items-center justify-center mb-5">
                        <svg class="w-6 h-6 stroke-[#9a3412] stroke-[1.8]" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="font-sans text-xl font-bold text-[#1a1a2e] mb-2">តេស្តសាកល្បងមុនពេលអ្នកទិញ</h3>
                    <p class="text-[#1a1a2e]/60 text-sm leading-relaxed">
                        មិនប្រាកដថាម៉ាស៊ីនបោះពុម្ពមួយណាស័ក្តិសមសម្រាប់អ្នកមែនទេ? មកកាន់ហាងរបស់យើង
                        ហើយសាកល្បងជាមួយម៉ូដែលម៉ាស៊ីនព្រីនណាមួយដោយផ្ទាល់។ បុគ្គលិករបស់យើងនឹងបោះពុម្ពសាកល្បង
                        ដើម្បីឱ្យអ្នកអាចវាយតម្លៃគុណភាពផ្ទាល់ភ្នែកបាន។</p>
                </div>
                <ul class="flex flex-col gap-3 flex-1" aria-label="Try before you buy details">
                    @foreach (['ការបង្ហាញផ្ទាល់សម្រាប់គ្រប់ម៉ូដែលទាំងអស់', 'ប្រៀបធៀបគុណភាពម៉ាស៊ីនទន្ទឹមគ្នា', 'ផ្តល់ជាយោបល់ពីអ្នកជំនាញស្របតាមតម្រូវការបោះពុម្ពរបស់អ្នក'] as $item)
                        <li class="flex items-start gap-3 text-sm text-[#1a1a2e]/75">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0 stroke-[#305CDE] stroke-2"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ $item }}
                        </li>
                    @endforeach
                </ul>
                <div class="mt-6 pt-5 border-t border-[#e8ede9]">
                    <a href="#visit"
                        class="inline-flex items-center gap-2 text-[#1a1a2e] font-semibold text-sm hover:gap-3 transition-all duration-200">
                        ស្វែងរកហាងរបស់យើង
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
