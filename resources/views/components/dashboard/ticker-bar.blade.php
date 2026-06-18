{{-- ticker bar --}}
<div class="overflow-hidden whitespace-nowrap w-full" aria-hidden="true">
    <div class="inline-flex w-max animate-ticker-scroll">
        @php
            $ticks = [
                'សេវាកម្មល្អ',
                'សេវារហ័សទាន់ចិត្ត',
                'គុណភាពជាចម្បង',
                'ក្រដាសទំហំ A3 & A4',
                'កូពីឬព្រីនជា Color ឬ សខ្មៅ',
                'ស្កេនឯកសារជា PDF',  
                'ទុកចិត្តដោយអតិថិជនជាង 500 នាក់',
            ];
        @endphp
        @foreach (array_merge($ticks, $ticks) as $tick)
            <span class="inline-flex items-center px-8 shrink-0 py-8">
                {!! $tick !!}
            </span>
        @endforeach
    </div>
</div>