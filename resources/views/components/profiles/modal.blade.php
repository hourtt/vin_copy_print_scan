@props(['id', 'title'])

<div class="profile-modal-overlay group" id="{{ $id }}" role="dialog" aria-modal="true" aria-labelledby="{{ $id }}-title">
    <div class="profile-modal-panel group-[.active]:translate-y-0 group-[.active]:scale-100">
        
        <div class="profile-modal-header">
            <h2 class="profile-modal-title" id="{{ $id }}-title">{{ $title }}</h2>
            <button class="profile-modal-close" onclick="closeModal('{{ $id }}')" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>
        </div>

        <div class="profile-modal-body">
            {{ $slot }}
        </div>
        
    </div>
</div>
