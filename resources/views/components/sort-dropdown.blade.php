@props([
    'id'       => 'sort-select',
    'options'  => [],
    'selected' => null,
    'label'    => 'Sort',
    'icon'     => 'list-filter',
])

@php
    $selected ??= array_key_first($options);
@endphp

<div class="relative w-[240px]" 
     x-data="{ 
        open: false, 
        selected: '{{ $selected }}',
        options: {{ json_encode($options) }},
        selectOption(val) {
            this.selected = val;
            this.open = false;
            const el = document.getElementById('{{ $id }}');
            if (el) {
                el.value = val;
                el.dispatchEvent(new Event('change', { bubbles: true }));
            }
        },
        focusNext() {
            if (!this.open) { this.open = true; }
            this.$nextTick(() => {
                const items = Array.from(this.$refs.menu.querySelectorAll('[role=\'menuitemradio\']'));
                if (items.length === 0) return;
                let index = items.indexOf(document.activeElement);
                index = (index + 1) % items.length;
                items[index].focus();
            });
        },
        focusPrev() {
            if (!this.open) return;
            const items = Array.from(this.$refs.menu.querySelectorAll('[role=\'menuitemradio\']'));
            if (items.length === 0) return;
            let index = items.indexOf(document.activeElement);
            index = index <= 0 ? items.length - 1 : index - 1;
            items[index].focus();
        }
     }"
     @click.outside="open = false" 
     @close.stop="open = false"
     @keydown.escape.prevent.stop="open = false; $refs.trigger.focus()"
     @popstate.window="setTimeout(() => { const el = document.getElementById('{{ $id }}'); if (el) selected = el.value; }, 50)">

    {{-- Hidden Select for native forms and external JS --}}
    <select id="{{ $id }}" class="hidden" aria-label="{{ $label }}" {{ $attributes }}>
        @foreach ($options as $value => $display)
            <option value="{{ $value }}" @selected($value === $selected)>
                {{ $display }}
            </option>
        @endforeach
    </select>

    {{-- Trigger Button --}}
    <button x-ref="trigger"
            type="button"
            @click="open = !open"
            @keydown.down.prevent="focusNext()"
            class="flex items-center justify-between w-full h-[44px] px-4 bg-white border border-gray-200 rounded-[10px] text-sm font-medium text-gray-700 transition-colors duration-200 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
            aria-haspopup="listbox"
            :aria-expanded="open.toString()">
        
        <div class="flex items-center gap-2">
            @if($icon === 'list-filter')
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                    <path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/>
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-500">
                    <path d="m3 16 4 4 4-4"/><path d="M7 20V4"/><path d="m21 8-4-4-4 4"/><path d="M17 4v16"/>
                </svg>
            @endif
            <span x-text="options[selected]"></span>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 transition-transform duration-200" :class="{'rotate-180': open}">
            <path d="m6 9 6 6 6-6"/>
        </svg>
    </button>

    {{-- Dropdown Menu --}}
    <div x-show="open"
         x-ref="menu"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="absolute z-50 right-0 mt-2 w-full min-w-[240px] rounded-[12px] bg-white border border-gray-200 shadow-[0_8px_24px_rgba(0,0,0,0.08)] py-2"
         style="display: none;"
         role="listbox"
         aria-orientation="vertical"
         @keydown.down.prevent="focusNext()"
         @keydown.up.prevent="focusPrev()">
        
        <template x-for="(display, val) in options" :key="val">
            <button type="button"
                    role="menuitemradio"
                    :aria-checked="selected === val"
                    @click="selectOption(val)"
                    @keydown.enter.prevent="selectOption(val)"
                    class="group flex items-center justify-between w-full h-[42px] px-4 text-start text-[14px] transition-colors duration-200 ease-out focus:outline-none"
                    :class="selected === val ? 'text-gray-900 font-semibold bg-gray-50' : 'text-gray-700 font-medium hover:bg-[#F3F4F6] hover:text-gray-900 focus:bg-[#F3F4F6]'">
                
                <span x-text="display"></span>

                <svg x-show="selected === val" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-900">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </button>
        </template>
    </div>
</div>