{{-- WHY CHOOSE US --}}
<section class="relative py-24 bg-[#1a1a2e] overflow-hidden font-['Kantumruy_Pro',sans-serif]" id="why">
    {{-- Decorative blobs (kept as CSS-in-HTML since they are purely decorative) --}}
    <div class="absolute w-96 h-96 rounded-full bg-[#305CDE] opacity-10 -top-24 -left-24 blur-3xl pointer-events-none"
        aria-hidden="true"></div>
    <div class="absolute w-72 h-72 rounded-full bg-[#d85a30] opacity-5 bottom-0 right-0 blur-3xl pointer-events-none"
        aria-hidden="true"></div>
    <div class="relative z-10 max-w-[1200px] mx-auto px-4 md:px-8">
        <p class="inline-block text-[#305CDE] text-lg mb-4">ហេតុអ្វីជ្រើសរើស Vin Copy Print
            Scan</p>
        <h2
            class="font-sans font-bold text-[clamp(2rem,4vw,3rem)] text-white tracking-tight leading-[1.15] max-w-[520px] mb-14">
            ការបោះពុម្ពធ្វើបានយ៉ាងត្រឹមត្រូវ,<br>រាល់ពេលទាំងអស់។
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $reasons = [
                    [
                        'num' => '01',
                        'title' => 'ជំនាញច្បាស់លាស់',
                        'desc' =>
                            'បុគ្គលិករបស់យើងស្គាល់ការបោះពុម្ពយ៉ាងច្បាស់។ យើងជួយអ្នកជ្រើសរើសម៉ាស៊ីនដែលត្រឹមត្រូវ សម្ភារៈប្រើប្រាស់ដែលត្រឹមត្រូវ និងក្រដាសដែលត្រឹមត្រូវតាំងពីដំបូង។',
                    ],
                    [
                        'num' => '02',
                        'title' => 'សេវាកម្មរហ័សក្នុងហាង',
                        'desc' =>
                            'ដើរចូលមកជាមួយឯកសាររបស់អ្នក ហើយត្រឡប់ទៅវិញជាមួយឯកសារថតចម្លងរបស់អ្នក។ មិនមានការរង់ចាំច្រើនថ្ងៃទេ។ ការងារក្នុងហាងភាគច្រើនត្រូវបានបញ្ចប់ខណៈពេលដែលអ្នករង់ចាំ។',
                    ],
                    [
                        'num' => '03',
                        'title' => 'ធានាគុណភាព',
                        'desc' =>
                            'រាល់ការបោះពុម្ពទាំងអស់មានភាពច្បាស់ ស្អាត និងដូចច្បាប់ដើម។ ប្រសិនបើមានអ្វីមិនត្រឹមត្រូវ ក្នុងករណីខ្លះយើងនឹងជួសជុលវាភ្លាមៗដោយមិនគិតថ្លៃបន្ថែម។',
                    ],
                    [
                        'num' => '04',
                        'title' => 'ផលិតផលសុទ្ធ និងអាចប្រើជំនួសបាន',
                        'desc' =>
                            'យើងមានប្រអប់ទឹកថ្នាំ OEM ព្រមជាមួយជម្រើសដែលអាចប្រើជំនួសបានដែលមានគុណភាព ដូច្នេះអ្នកអាចជ្រើសរើសដំណើរការ ឬតម្លៃ ដោយមានទំនុកចិត្តពេញលេញលើជម្រើសណាមួយ។',
                    ],
                    [
                        'num' => '05',
                        'title' => 'ធ្វើការតេស្តសាកល្បងសិនមុនពេលអ្នកទិញ',
                        'desc' =>
                            'រាល់ម៉ូដែលម៉ាស៊ីនបោះពុម្ពដែលដាក់តាំងបង្ហាញនៅហាងយើងគឺលោកអ្នកអាចធ្វើការតេស្តសាកល្បងសិនមុនពេលសម្រេចចិត្តទិញ។',
                    ],
                    [
                        'num' => '06',
                        'title' => 'តម្លៃតម្លាភាព',
                        'desc' =>
                            'គ្មានការភ្ញាក់ផ្អើលទេ។ អត្រាថតចម្លងក្នុងមួយទំព័រ និងតម្លៃផលិតផលត្រូវបានរាយនាមយ៉ាងច្បាស់។ ការបញ្ចុះតម្លៃលើបរិមាណច្រើនអនុវត្តដោយស្វ័យប្រវត្តិ មិនចាំបាច់តថ្លៃឡើយ។',
                    ],
                ];
            @endphp
            @foreach ($reasons as $reason)
                <div class="group">
                    <div
                        class="text-3xl font-bold text-white/10 font-['Fraunces',serif] mb-4 group-hover:text-[#ffffff] transition-colors duration-300">
                        {{ $reason['num'] }}
                    </div>
                    <h3 class="text-white font-semibold text-lg mb-2">{{ $reason['title'] }}</h3>
                    <p class="text-white/50 text-sm leading-relaxed">{{ $reason['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
