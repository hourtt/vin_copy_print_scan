<x-app-layout>
    <div class="profile-page">

        {{-- ═══════════════════════════════════════
             HERO — Avatar + User Info
        ═══════════════════════════════════════ --}}
        <div class="profile-hero">

            {{-- Spinning gradient ring + avatar --}}
            <div class="profile-avatar-ring">
                <div class="profile-avatar-inner">
                    <span class="profile-avatar-initials">
                        {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                    </span>
                </div>
            </div>

            {{-- Name & Email --}}
            <div>
                <h1 class="profile-user-name">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </h1>
                <p class="profile-user-email">{{ Auth::user()->email }}</p>
            </div>

            {{-- Edit profile info trigger --}}
            <button
                class="profile-edit-info-btn"
                onclick="openModal('modal-profile-info')"
                id="btn-edit-profile-info"
                type="button"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
                Edit Profile
            </button>
        </div>

        {{-- ═══════════════════════════════════════
             MENU CARDS
        ═══════════════════════════════════════ --}}
        <div class="profile-menu" role="list">

            <div class="profile-section-label">Account Settings</div>

            {{-- Password & Security --}}
            <button
                class="profile-menu-card"
                onclick="openModal('modal-password')"
                id="btn-password-security"
                type="button"
                role="listitem"
            >
                <div class="profile-menu-icon profile-menu-icon--security">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <div class="profile-menu-text">
                    <p class="profile-menu-title">Password &amp; Security</p>
                    <p class="profile-menu-sub">Change your password or manage 2FA</p>
                </div>
                <svg class="profile-menu-chevron" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
            </button>

            {{-- Payment Method --}}
            <button
                class="profile-menu-card"
                onclick="openModal('modal-payment')"
                id="btn-payment-method"
                type="button"
                role="listitem"
            >
                <div class="profile-menu-icon profile-menu-icon--payment">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                        <line x1="1" y1="10" x2="23" y2="10"/>
                    </svg>
                </div>
                <div class="profile-menu-text">
                    <p class="profile-menu-title">Payment Method</p>
                    <p class="profile-menu-sub">Manage your saved cards &amp; billing</p>
                </div>
                <div style="display:flex;align-items:center;gap:0.5rem;">
                    <span class="profile-badge-coming">Soon</span>
                    <svg class="profile-menu-chevron" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </div>
            </button>

            <div class="profile-section-label">Activity</div>

            {{-- Order History --}}
            <a
                href="{{ route('orders.index') }}"
                class="profile-menu-card"
                id="btn-order-history"
                role="listitem"
            >
                <div class="profile-menu-icon profile-menu-icon--orders">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>
                <div class="profile-menu-text">
                    <p class="profile-menu-title">Order History</p>
                    <p class="profile-menu-sub">View all your past orders &amp; status</p>
                </div>
                <svg class="profile-menu-chevron" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
            </a>

            {{-- Address --}}
            <button
                class="profile-menu-card"
                onclick="openModal('modal-address')"
                id="btn-address"
                type="button"
                role="listitem"
            >
                <div class="profile-menu-icon profile-menu-icon--address">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>
                <div class="profile-menu-text">
                    <p class="profile-menu-title">Address</p>
                    <p class="profile-menu-sub">Manage your delivery addresses</p>
                </div>
                <div style="display:flex;align-items:center;gap:0.5rem;">
                    <span class="profile-badge-coming">Soon</span>
                    <svg class="profile-menu-chevron" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </div>
            </button>

        </div>{{-- /.profile-menu --}}

        {{-- ═══════════════════════════════════════
             LOG OUT BUTTON
        ═══════════════════════════════════════ --}}
        <form method="POST" action="{{ route('logout') }}" style="width:100%;max-width:480px;margin-top:1.75rem;">
            @csrf
            <button type="submit" class="profile-logout-btn" id="btn-logout">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Log Out
            </button>
        </form>

    </div>{{-- /.profile-page --}}


    {{-- ═══════════════════════════════════════════════════════════
         MODAL — Edit Profile Information
    ═══════════════════════════════════════════════════════════ --}}
    <div class="profile-modal-overlay" id="modal-profile-info" role="dialog" aria-modal="true" aria-labelledby="modal-profile-info-title">
        <div class="profile-modal-panel">
            <div class="profile-modal-header">
                <h2 class="profile-modal-title" id="modal-profile-info-title">Edit Profile</h2>
                <button class="profile-modal-close" onclick="closeModal('modal-profile-info')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="profile-modal-body">
                @if (session('status') === 'profile-updated')
                    <div class="profile-success-toast">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        Profile updated successfully!
                    </div>
                @endif

                <form method="post" action="{{ route('profile.update') }}" id="form-profile-info">
                    @csrf
                    @method('patch')

                    <div class="profile-form-group">
                        <x-floating-input
                            id="first_name"
                            name="first_name"
                            type="text"
                            label="First Name"
                            :value="old('first_name', $user->first_name)"
                            required
                            autofocus
                            autocomplete="first_name"
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                    </div>

                    <div class="profile-form-group">
                        <x-floating-input
                            id="last_name"
                            name="last_name"
                            type="text"
                            label="Last Name"
                            :value="old('last_name', $user->last_name)"
                            required
                            autocomplete="last_name"
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                    </div>

                    <div class="profile-form-group">
                        <x-floating-input
                            id="email"
                            name="email"
                            type="email"
                            label="Email"
                            :value="old('email', $user->email)"
                            required
                            autocomplete="username"
                        />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div class="profile-form-actions">
                        <button type="button" class="profile-btn-secondary" onclick="closeModal('modal-profile-info')">Cancel</button>
                        <button type="submit" class="profile-btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════════════════════
         MODAL — Password & Security
    ═══════════════════════════════════════════════════════════ --}}
    <div class="profile-modal-overlay" id="modal-password" role="dialog" aria-modal="true" aria-labelledby="modal-password-title">
        <div class="profile-modal-panel">
            <div class="profile-modal-header">
                <h2 class="profile-modal-title" id="modal-password-title">Password &amp; Security</h2>
                <button class="profile-modal-close" onclick="closeModal('modal-password')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="profile-modal-body">
                @if (session('status') === 'password-updated')
                    <div class="profile-success-toast">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        Password updated successfully!
                    </div>
                @endif

                <form method="post" action="{{ route('password.update') }}" id="form-password">
                    @csrf
                    @method('put')

                    <div class="profile-form-group">
                        <x-floating-input
                            id="update_password_current_password"
                            name="current_password"
                            type="password"
                            label="Current Password"
                            autocomplete="current-password"
                        />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div class="profile-form-group">
                        <x-floating-input
                            id="update_password_password"
                            name="password"
                            type="password"
                            label="New Password"
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div class="profile-form-group">
                        <x-floating-input
                            id="update_password_password_confirmation"
                            name="password_confirmation"
                            type="password"
                            label="Confirm New Password"
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="profile-form-actions">
                        <button type="button" class="profile-btn-secondary" onclick="closeModal('modal-password')">Cancel</button>
                        <button type="submit" class="profile-btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════════════════════
         MODAL — Payment Method (Coming Soon)
    ═══════════════════════════════════════════════════════════ --}}
    <div class="profile-modal-overlay" id="modal-payment" role="dialog" aria-modal="true" aria-labelledby="modal-payment-title">
        <div class="profile-modal-panel">
            <div class="profile-modal-header">
                <h2 class="profile-modal-title" id="modal-payment-title">Payment Method</h2>
                <button class="profile-modal-close" onclick="closeModal('modal-payment')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="profile-modal-body" style="text-align:center;padding:2.5rem 1.5rem;">
                <div style="width:56px;height:56px;border-radius:16px;background:rgba(212,165,116,0.15);display:flex;align-items:center;justify-content:center;margin:0 auto 1.25rem;color:var(--gold);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <h3 style="font-family:'DM Sans',sans-serif;font-size:1.1rem;font-weight:700;color:var(--ink);margin:0 0 0.5rem;">Coming Soon</h3>
                <p style="font-family:'DM Sans',sans-serif;font-size:0.875rem;color:var(--ink-muted);margin:0 0 1.5rem;line-height:1.6;">Payment method management is currently under development. We'll notify you when it's ready.</p>
                <button type="button" class="profile-btn-primary" style="max-width:180px;margin:0 auto;" onclick="closeModal('modal-payment')">Got it</button>
            </div>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════════════════════
         MODAL — Address (Coming Soon)
    ═══════════════════════════════════════════════════════════ --}}
    <div class="profile-modal-overlay" id="modal-address" role="dialog" aria-modal="true" aria-labelledby="modal-address-title">
        <div class="profile-modal-panel">
            <div class="profile-modal-header">
                <h2 class="profile-modal-title" id="modal-address-title">Delivery Address</h2>
                <button class="profile-modal-close" onclick="closeModal('modal-address')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="profile-modal-body" style="text-align:center;padding:2.5rem 1.5rem;">
                <div style="width:56px;height:56px;border-radius:16px;background:rgba(216,90,48,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 1.25rem;color:var(--coral);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <h3 style="font-family:'DM Sans',sans-serif;font-size:1.1rem;font-weight:700;color:var(--ink);margin:0 0 0.5rem;">Coming Soon</h3>
                <p style="font-family:'DM Sans',sans-serif;font-size:0.875rem;color:var(--ink-muted);margin:0 0 1.5rem;line-height:1.6;">Address management is currently under development. You'll be able to save and manage multiple delivery addresses here.</p>
                <button type="button" class="profile-btn-primary" style="max-width:180px;margin:0 auto;" onclick="closeModal('modal-address')">Got it</button>
            </div>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════════════════════
         MODAL JAVASCRIPT
    ═══════════════════════════════════════════════════════════ --}}
    <script>
        function openModal(id) {
            const overlay = document.getElementById(id);
            if (!overlay) return;
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            const overlay = document.getElementById(id);
            if (!overlay) return;
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Close on backdrop click
        document.querySelectorAll('.profile-modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.profile-modal-overlay.active').forEach(overlay => {
                    closeModal(overlay.id);
                });
            }
        });

        // Auto-open modals if there are validation errors
        @if ($errors->updatePassword->isNotEmpty())
            openModal('modal-password');
        @endif

        @if ($errors->get('first_name') || $errors->get('last_name') || $errors->get('email'))
            openModal('modal-profile-info');
        @endif

        // Auto-open if session status indicates recent update
        @if (session('status') === 'profile-updated')
            openModal('modal-profile-info');
        @endif

        @if (session('status') === 'password-updated')
            openModal('modal-password');
        @endif
    </script>

</x-app-layout>
