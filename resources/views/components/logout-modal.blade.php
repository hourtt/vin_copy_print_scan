{{-- ═══════════════════════════════════════════════════════════
     MODAL — Logout Confirmation
═══════════════════════════════════════════════════════════ --}}
<div class="profile-modal-overlay group" id="modal-logout" role="dialog" aria-modal="true" aria-labelledby="modal-logout-title">
    <div class="profile-modal-panel logout-modal-panel group-[.active]:translate-y-0 group-[.active]:scale-100">
        <div class="logout-modal-content">
            <h2 class="logout-modal-title" id="modal-logout-title">Logout</h2>
            <p class="logout-modal-text">
                Are you sure you want to <span class="font-semibold">log out</span>?
            </p>
            
            <form method="POST" action="{{ route('logout') }}" class="logout-modal-actions">
                @csrf
                <button type="button" class="logout-btn-cancel" onclick="closeLogoutModal()">Cancel</button>
                <button type="submit" class="logout-btn-confirm">Log Out</button>
            </form>
        </div>
    </div>
</div>

<script>
    function openLogoutModal() {
        const overlay = document.getElementById('modal-logout');
        if (!overlay) return;
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLogoutModal() {
        const overlay = document.getElementById('modal-logout');
        if (!overlay) return;
        overlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Close on backdrop click
    document.getElementById('modal-logout')?.addEventListener('click', function(e) {
        if (e.target === this) {
            closeLogoutModal();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const overlay = document.getElementById('modal-logout');
            if (overlay && overlay.classList.contains('active')) {
                closeLogoutModal();
            }
        }
    });
</script>
