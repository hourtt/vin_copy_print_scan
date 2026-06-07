  {{-- ticker bar --}}
    <div class="ticker-bar" aria-hidden="true">
        <div class="ticker-track">
            @php
            $ticks = [
                'Quality printing',
                'A3 · A4 formats',
                'Best Service',
                'Color &amp; black-and-white',
                'Scan to PDF or email',
                'Pick-up or delivery',
                'Trusted by more than 500 customers',
            ];
            @endphp
            @foreach (array_merge($ticks, $ticks) as $tick)
                <span class="ticker-item">
                    <span class="font font-bold"></span>
                    {!! $tick !!}
                </span>
            @endforeach
        </div>
    </div>