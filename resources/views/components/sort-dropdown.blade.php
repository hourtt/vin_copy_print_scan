@props([
    'id'       => 'sort-select',
    'options'  => [],
    'selected' => null,
    'label'    => 'Sort',
    'icon'     => 'chevron',
])

@php
    $selected ??= array_key_first($options);
@endphp

<div class="relative w-64" x-data="{ open: false }">

    <select
        id="{{ $id }}"
        aria-label="{{ $label }}"
        class="w-full py-[0.65rem] pl-4 pr-9
               border border-zinc-200 rounded-lg
               text-sm text-zinc-800 bg-white
               cursor-pointer appearance-none bg-none
               outline-none
               transition-all duration-200
               hover:border-zinc-300
               focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20"
        @click="open = !open"
        @blur="open = false"
        @change="open = false"
    >
        @foreach ($options as $value => $display)
            <option value="{{ $value }}" @selected($value === $selected)>
                {{ $display }}
            </option>
        @endforeach
    </select>

    {{-- Arrow icon — rotates smoothly via Alpine :class binding --}}
    @if ($icon === 'chevron' || $icon === 'sort')
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16" height="16"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
            class="absolute right-3 top-1/2 -translate-y-1/2
                   text-zinc-400 pointer-events-none
                   transition-transform duration-200"
            :class="{ 'rotate-180 text-blue-500': open }"
            aria-hidden="true"
        >
            <path d="M6 9l6 6 6-6" />
        </svg>
    @endif
</div>