@props(['id', 'title'])

<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-gray-900/50 backdrop-blur-sm opacity-0 invisible [&.active]:opacity-100 [&.active]:visible transition-all duration-300 group"
    id="{{ $id }}" role="dialog" aria-modal="true" aria-labelledby="{{ $id }}-title">
    <div
        class="bg-white rounded-xl shadow-xl w-full max-w-md transform transition-all duration-300 scale-95 opacity-0 group-[.active]:scale-100 group-[.active]:opacity-100 flex flex-col max-h-full">

        <div class="flex items-center justify-between w-full p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-900" id="{{ $id }}-title">
                {{ $headerTitle ?? ($title ?? 'Delivery Address') }}
            </h2>
            <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors ml-auto"
                onclick="closeModal('{{ $id }}')" aria-label="Close">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>

        <div class="p-6 overflow-y-auto">
            {{ $slot }}
        </div>

    </div>
</div>
