{{-- HOW IT WORKS --}}
<section class="bg-white py-8 pb-20">
    <div class="max-w-[1200px] mx-auto px-4 md:px-8">
        <div class="text-center mb-1">
            <p class="inline-block font-bold tracking-[0.12em] uppercase text-blue-600 text-sm mb-3">
                Simple process
            </p>
        </div>
        <h2 class="font-sans font-bold text-center mx-auto max-w-[400px] text-[clamp(2rem,4vw,3rem)] text-[#1a1a2e] tracking-tight leading-[1.15] mb-12">
            ធ្វើការបញ្ជាទិញតាម៤ជំហានងាយៗ
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-0 relative">
            {{-- Connecting line (desktop only) --}}
            <div class="hidden lg:block absolute top-7 left-[12.5%] right-[12.5%] h-px bg-[#1a1a2e]/10 z-0"></div>

            @php
                $steps = [
                    ['num' => '01', 'title' => 'ជ្រើសរើសផលិតផលដែលអ្នកចង់បញ្ជាទិញ', 'desc' => 'ចូលមើលផលិតផលរបស់យើងខ្ញុំហើយជ្រើសរើសម៉ូដែលដែលសាកសមនឹងតម្រូវការរបស់អ្នក។'],
                    ['num' => '02', 'title' => 'ធ្វើការកុម្ម៉ង់', 'desc' => 'ចូលទៅកាន់ផ្នែកកុម្ម៉ង់ ហើយជ្រើសរើសជម្រើសដែលអ្នកចង់បាន។'],
                    ['num' => '03', 'title' => 'រៀបចំទំនិញ', 'desc' => 'ការបញ្ជាទិញរបស់អ្នកនឹងត្រូវបានដំណើរការ និងរៀបចំសម្រាប់ការដឹកជញ្ជូន ឬយកដោយផ្ទាល់។'],
                    ['num' => '04', 'title' => 'ដឹកជញ្ជូនដល់ទីតាំង', 'desc' => 'ប្រគល់ជូនដល់ទីតាំងដែលបានកុម្ម៉ង់ ក្នុងរយៈពេលដ៏ខ្លី។'],
                ];
            @endphp

            @foreach ($steps as $step)
                <div class="flex flex-col items-center text-center px-5 relative z-10 group">
                    <div class="w-14 h-14 rounded-full bg-white border border-[#1a1a2e]/15 flex items-center justify-center font-['Inter',sans-serif] text-lg font-bold text-blue-600 mb-5 group-hover:bg-blue-600 group-hover:border-blue-600 group-hover:text-white transition-all duration-200">
                        {{ $step['num'] }}
                    </div>
                    <h4 class="font-sans text-[1.05rem] font-semibold text-[#1a1a2e] mb-1">
                        {{ $step['title'] }}
                    </h4>
                    <p class="text-sm text-[#1a1a2e]/55 leading-relaxed font-sans">
                        {{ $step['desc'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
