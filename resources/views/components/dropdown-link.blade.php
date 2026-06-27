<a {{ $attributes->merge(['class' => 'group flex items-center gap-3 w-full px-4 py-3 text-start text-sm font-medium text-gray-700 rounded-none hover:bg-[#f4f4f5] hover:text-gray-900 focus:outline-none focus:bg-[#f4f4f5] focus:text-gray-900 transition-colors duration-150 ease-in-out']) }} role="menuitem">
    <span class="w-4 h-4 flex-shrink-0 text-gray-400 group-hover:text-gray-600 transition-colors duration-150">
        @if (isset($icon))
            {{ $icon }}
        @else
            {{-- Default placeholder icon --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-full h-full">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        @endif
    </span>
    <span>{{ $slot }}</span>
</a>
