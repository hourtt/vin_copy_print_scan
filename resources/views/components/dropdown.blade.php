@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'py-2 bg-white'])

@php
$alignmentClasses = match ($align) {
    'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
    'top' => 'origin-top',
    default => 'ltr:origin-top-right rtl:origin-top-left end-0',
};

$width = match ($width) {
    '48' => 'w-48',
    '56' => 'w-56',
    default => $width,
};
@endphp

<div class="relative" 
     x-data="{ 
        open: false,
        focusNext() {
            if (!this.open) {
                this.open = true;
            }
            this.$nextTick(() => {
                const items = Array.from(this.$refs.menu.querySelectorAll('[role=\'menuitem\']'));
                if (items.length === 0) return;
                let index = items.indexOf(document.activeElement);
                index = (index + 1) % items.length;
                items[index].focus();
            });
        },
        focusPrev() {
            if (!this.open) return;
            const items = Array.from(this.$refs.menu.querySelectorAll('[role=\'menuitem\']'));
            if (items.length === 0) return;
            let index = items.indexOf(document.activeElement);
            index = index <= 0 ? items.length - 1 : index - 1;
            items[index].focus();
        },
        closeFocus() {
            this.open = false;
            this.$refs.trigger.focus();
        }
     }" 
     @click.outside="open = false" 
     @close.stop="open = false"
     @keydown.escape.prevent.stop="closeFocus()">
    
    <div @click="open = ! open" x-ref="trigger" aria-haspopup="true" :aria-expanded="open.toString()" @keydown.down.prevent="focusNext()">
        {{ $trigger }}
    </div>

    <div x-show="open"
         x-ref="menu"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
         x-transition:leave-end="opacity-0 -translate-y-2 scale-95"
         class="absolute z-50 mt-2 {{ $width }} rounded-xl shadow-[0_8px_30px_rgb(0,0,0,0.08)] {{ $alignmentClasses }}"
         style="display: none;"
         @click="open = false"
         role="menu"
         aria-orientation="vertical"
         @keydown.down.prevent="focusNext()"
         @keydown.up.prevent="focusPrev()">
        <div class="rounded-xl overflow-hidden {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>
