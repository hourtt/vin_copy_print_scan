{{-- ticker bar --}}
<div class="overflow-hidden whitespace-nowrap w-full" aria-hidden="true">
    <div class="inline-flex w-max animate-ticker-scroll">
        @php
            $ticks = [
                'Quality printing',
                'Best Service',
                'A3 & A4 formats',
                'Color &amp; black & white',
                'Scan to PDF or email',
                'Pick-up or delivery',
                'Trusted by more than 500 customers',
            ];
        @endphp
        @foreach (array_merge($ticks, $ticks) as $tick)
            <span class="inline-flex items-center px-8 shrink-0 py-8">
                {!! $tick !!}
            </span>
        @endforeach
    </div>
</div>