@props(['class' => 'w-5 h-5 shrink-0 stroke-current stroke-[1.8]'])
<svg {{ $attributes->except('class') }} class="{{ $class }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
