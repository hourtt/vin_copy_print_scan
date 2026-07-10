<x-app-layout>
    <div class="settings-layout">

        {{-- ═══════════════════════════════════════
             PANEL 1: FAR-LEFT GLOBAL NAV
        ═══════════════════════════════════════ --}}
        <aside class="settings-global-nav">
            <div class="global-nav-top">
                {{-- Customer Account Dropdown Trigger / Avatar --}}
                <div class="global-nav-item" aria-label="Customer Account">
                    <div
                        class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center text-white font-bold text-sm uppercase">
                        {{ substr(Auth::user()->first_name, 0, 1) }}
                    </div>
                </div>

                {{-- Separator --}}
                <div class="w-8 h-px bg-white/10 my-2"></div>

                {{-- Home / Storefront --}}
                <a href="{{ route('dashboard') }}" class="global-nav-item" aria-label="Storefront">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                </a>

                {{-- My Orders --}}
                <a href="{{ route('orders.index') }}" class="global-nav-item" aria-label="My Orders">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                        </path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                </a>

                {{-- My Subscriptions (Placeholder) --}}
                <button type="button" class="global-nav-item" aria-label="My Subscriptions">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <polyline points="1 20 1 14 7 14"></polyline>
                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                    </svg>
                </button>

                {{-- Saved Items / Wishlist (Placeholder) --}}
                <button type="button" class="global-nav-item" aria-label="Wishlist">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg>
                </button>
            </div>

            <div class="global-nav-bottom">
                {{-- Support / Help Center (Placeholder) --}}
                <button type="button" class="global-nav-item mb-2" aria-label="Help Center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                </button>

                {{-- Logout --}}
                <div class="w-full flex justify-center">
                    <button type="button"
                        class="global-nav-item text-[#fca5a5] hover:bg-[#ef4444]/10 hover:text-[#ef4444]"
                        aria-label="Log Out" onclick="openLogoutModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </aside>

        {{-- ═══════════════════════════════════════
             PANEL 2: INNER-LEFT SETTINGS MENU
        ═══════════════════════════════════════ --}}
        <nav class="settings-sidebar">
            <div class="settings-sidebar-header">
                <h1 class="settings-sidebar-title">Settings</h1>
            </div>

            <div class="settings-sidebar-nav">
                <button class="settings-tab active" type="button">General Profile</button>
                <button class="settings-tab" type="button" onclick="openModal('modal-address')">Address Book</button>
                <button class="settings-tab" type="button" onclick="openModal('modal-payment')">Payment
                    Methods</button>
                <button class="settings-tab" type="button" onclick="openModal('modal-password')">Login &amp;
                    Security</button>
                <button class="settings-tab" type="button">Notification Preferences</button>
            </div>
        </nav>

        {{-- ═══════════════════════════════════════
             PANEL 3: MAIN CONTENT AREA
        ═══════════════════════════════════════ --}}
        <main class="settings-content-wrapper">
            <div class="settings-content">

                {{-- Header / Avatar --}}
                <div class="settings-header-section">
                    <div class="settings-avatar-wrap">
                        <span class="settings-avatar-initials">
                            {{ substr(Auth::user()->first_name, 0, 1) }}
                        </span>
                    </div>

                    <div class="settings-header-info">
                        <h2 class="settings-header-name">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </h2>
                        <div class="settings-avatar-actions">
                            <button type="button" class="btn-outline-sm">Upload new</button>
                            <button type="button"
                                class="btn-outline-sm text-[#ef4444] hover:bg-[#fef2f2] hover:border-[#fca5a5]">Delete</button>
                        </div>
                    </div>
                </div>

                {{-- Inline-Editable Profile Rows --}}
                <div class="settings-row-group">
                    <h3 class="settings-section-title">Personal Information</h3>

                    {{-- ─── Row 1: Full Name (inline edit) ─── --}}
                    <div class="settings-row" data-inline-field="name">

                        <div class="settings-row-label">Full Name</div>

                        {{-- Display slot: shown by default --}}
                        <div class="settings-row-value ie-display">
                            <span id="ie-display-name">{{ Auth::user()->first_name }}
                                {{ Auth::user()->last_name }}</span>
                        </div>
                        <div class="settings-row-action ie-display">
                            <button type="button" class="btn-edit-link" onclick="ieOpen('name')">Edit</button>
                        </div>

                        {{-- Editor slot: hidden by default --}}
                        <div class="ie-editor" id="ie-editor-name" style="display:none;">
                            <form method="POST" action="{{ route('profile.update') }}" class="ie-form"
                                data-field="name">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="inline_field" value="name">
                                <div class="ie-inputs-group">
                                    <div class="ie-input-wrap">
                                        <label class="ie-label" for="ie-first-name">First Name</label>
                                        <input class="ie-input @error('first_name') ie-input--error @enderror"
                                            id="ie-first-name" type="text" name="first_name"
                                            value="{{ old('first_name', Auth::user()->first_name) }}"
                                            autocomplete="given-name" required>
                                        @error('first_name')
                                            <p class="ie-error-msg">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="ie-input-wrap">
                                        <label class="ie-label" for="ie-last-name">Last Name</label>
                                        <input class="ie-input @error('last_name') ie-input--error @enderror"
                                            id="ie-last-name" type="text" name="last_name"
                                            value="{{ old('last_name', Auth::user()->last_name) }}"
                                            autocomplete="family-name" required>
                                        @error('last_name')
                                            <p class="ie-error-msg">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="ie-actions">
                                    <button type="submit" class="ie-btn-save">Save</button>
                                    <button type="button" class="ie-btn-cancel"
                                        onclick="ieClose('name')">Cancel</button>
                                </div>
                            </form>
                        </div>

                    </div>

                    {{-- ─── Row 2: Contact Details (inline edit) ─── --}}
                    <div class="settings-row" data-inline-field="email">

                        <div class="settings-row-label">Contact Details</div>

                        {{-- Display slot: shown by default --}}
                        <div class="settings-row-value ie-display">
                            <div id="ie-display-email">{{ Auth::user()->email }}</div>
                            <div class="text-sm text-[var(--ink-muted)] mt-1">Phone not added</div>
                        </div>
                        <div class="settings-row-action ie-display">
                            <button type="button" class="btn-edit-link" onclick="ieOpen('email')">Edit</button>
                        </div>

                        {{-- Editor slot: hidden by default --}}
                        <div class="ie-editor" id="ie-editor-email" style="display:none;">
                            <form method="POST" action="{{ route('profile.update') }}" class="ie-form"
                                data-field="email">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="inline_field" value="email">
                                <div class="ie-inputs-group">
                                    <div class="ie-input-wrap" style="max-width:340px;">
                                        <label class="ie-label" for="ie-email">Email Address</label>
                                        <input class="ie-input @error('email') ie-input--error @enderror"
                                            id="ie-email" type="email" name="email"
                                            value="{{ old('email', Auth::user()->email) }}" autocomplete="email"
                                            required>
                                        @error('email')
                                            <p class="ie-error-msg">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="ie-actions">
                                    <button type="submit" class="ie-btn-save">Save</button>
                                    <button type="button" class="ie-btn-cancel"
                                        onclick="ieClose('email')">Cancel</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>

                <div class="settings-row-group">
                    <h3 class="settings-section-title">Shipping &amp; Billing</h3>

                    {{-- Row 3: Shipping Address --}}
                    <div class="settings-row">
                        <div class="settings-row-label">Default Address</div>
                        <div class="settings-row-value">
                            123 Paper Street<br>
                            New York, NY 10001
                        </div>
                        <div class="settings-row-action">
                            <button type="button" class="btn-edit-link"
                                onclick="openModal('modal-address')">Edit</button>
                        </div>
                    </div>

                    {{-- Row 4: Language & Currency --}}
                    <div class="settings-row">
                        <div class="settings-row-label">Preferences</div>
                        <div class="settings-row-value">
                            English (US)<br>
                            USD ($)
                        </div>
                        <div class="settings-row-action">
                            <button type="button" class="btn-edit-link">Edit</button>
                        </div>
                    </div>
                </div>

                <div class="settings-row-group">
                    <h3 class="settings-section-title">Security &amp; Integrations</h3>

                    {{-- Row 5: Connected Accounts --}}
                    <div class="settings-row">
                        <div class="settings-row-label">Connected Accounts</div>
                        <div class="settings-row-value flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                    fill="#4285F4" />
                                <path
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                    fill="#34A853" />
                                <path
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"
                                    fill="#FBBC05" />
                                <path
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"
                                    fill="#EA4335" />
                            </svg>
                            Signed in with Google
                        </div>
                        <div class="settings-row-action">
                            <button type="button" class="btn-edit-link">Manage</button>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>


    {{-- MODAL — Edit Profile Information --}}
    <div class="profile-modal-overlay group" id="modal-profile-info" role="dialog" aria-modal="true"
        aria-labelledby="modal-profile-info-title">
        <div class="profile-modal-panel group-[.active]:translate-y-0 group-[.active]:scale-100">
            <div class="profile-modal-header">
                <h2 class="profile-modal-title" id="modal-profile-info-title">Edit Profile</h2>
                <button class="profile-modal-close" onclick="closeModal('modal-profile-info')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="profile-modal-body">
                @if (session('status') === 'profile-updated')
                    <div class="profile-success-toast">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        Profile updated successfully!
                    </div>
                @endif

                <form method="post" action="{{ route('profile.update') }}" id="form-profile-info">
                    @csrf
                    @method('patch')

                    <div class="profile-form-group">
                        <x-floating-input id="first_name" name="first_name" type="text" label="First Name"
                            :value="old('first_name', Auth::user()->first_name)" required autofocus autocomplete="first_name" />
                        <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                    </div>

                    <div class="profile-form-group">
                        <x-floating-input id="last_name" name="last_name" type="text" label="Last Name"
                            :value="old('last_name', Auth::user()->last_name)" required autocomplete="last_name" />
                        <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                    </div>

                    <div class="profile-form-group">
                        <x-floating-input id="email" name="email" type="email" label="Email"
                            :value="old('email', Auth::user()->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>

                    <div class="profile-form-actions">
                        <button type="button" class="profile-btn-secondary"
                            onclick="closeModal('modal-profile-info')">Cancel</button>
                        <button type="submit" class="profile-btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- MODAL — Password & Security --}}
    <div class="profile-modal-overlay group" id="modal-password" role="dialog" aria-modal="true"
        aria-labelledby="modal-password-title">
        <div class="profile-modal-panel group-[.active]:translate-y-0 group-[.active]:scale-100">
            <div class="profile-modal-header">
                <h2 class="profile-modal-title" id="modal-password-title">Password &amp; Security</h2>
                <button class="profile-modal-close" onclick="closeModal('modal-password')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
            <div class="profile-modal-body">
                @if (session('status') === 'password-updated')
                    <div class="profile-success-toast">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        Password updated successfully!
                    </div>
                @endif

                <form method="post" action="{{ route('password.update') }}" id="form-password">
                    @csrf
                    @method('put')

                    <div class="profile-form-group">
                        <x-floating-input id="update_password_current_password" name="current_password"
                            type="password" label="Current Password" autocomplete="current-password" />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div class="profile-form-group">
                        <x-floating-input id="update_password_password" name="password" type="password"
                            label="New Password" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div class="profile-form-group">
                        <x-floating-input id="update_password_password_confirmation" name="password_confirmation"
                            type="password" label="Confirm New Password" autocomplete="new-password" />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="profile-form-actions">
                        <button type="button" class="profile-btn-secondary"
                            onclick="closeModal('modal-password')">Cancel</button>
                        <button type="submit" class="profile-btn-primary">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- 
         MODAL — Payment Method (Coming Soon)
     --}}
    <x-profiles.modal id="modal-payment" title="Payment Method">
        <div class="text-center py-10 px-6">
            <div
                class="w-14 h-14 rounded-2xl bg-[rgba(212,165,116,0.15)] flex items-center justify-center mx-auto mb-5 text-[var(--gold)]">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2" />
                    <line x1="1" y1="10" x2="23" y2="10" />
                </svg>
            </div>
            <h3 class="font-['DM_Sans',sans-serif] text-[1.1rem] font-bold text-[var(--ink)] m-0 mb-[0.5rem]">
                Coming Soon</h3>
            <p
                class="font-['DM_Sans',sans-serif] text-[0.875rem] text-[var(--ink-muted)] m-0 mb-[1.5rem] leading-[1.6]">
                Payment method management is currently under development. We'll notify you when it's ready.</p>
            <button type="button" class="profile-btn-primary max-w-[180px] mx-auto block"
                onclick="closeModal('modal-payment')">Got it</button>
        </div>
    </x-profiles.modal>

    {{-- 
         MODAL — Address (Coming Soon)
     --}}
    <x-profiles.modal id="modal-address" title="Delivery Address">
        <div class="text-center py-10 px-6">
            <div
                class="w-14 h-14 rounded-2xl bg-[rgba(216,90,48,0.1)] flex items-center justify-center mx-auto mb-5 text-[var(--coral)]">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                    <circle cx="12" cy="10" r="3" />
                </svg>
            </div>
            <h3 class="font-['DM_Sans',sans-serif] text-[1.1rem] font-bold text-[var(--ink)] m-0 mb-[0.5rem]">
                Coming Soon</h3>
            <p
                class="font-['DM_Sans',sans-serif] text-[0.875rem] text-[var(--ink-muted)] m-0 mb-[1.5rem] leading-[1.6]">
                Address management is currently under development. You'll be able to save and manage multiple
                delivery addresses here.</p>
            <button type="button" class="profile-btn-primary max-w-[180px] mx-auto block"
                onclick="closeModal('modal-address')">Got it</button>
        </div>
    </x-profiles.modal>


    {{-- 
         INLINE EDITING + MODAL JAVASCRIPT
     --}}
    @push('scripts')
        @vite(['resources/js/profile.js'])

        <script>
            // Auto-open modals if there are validation errors (password modal, etc.)
            @if ($errors->updatePassword->isNotEmpty())
                document.addEventListener('DOMContentLoaded', () => openModal('modal-password'));
            @endif

            // Auto-open if session status indicates recent update via the old modal flow
            @if (session('status') === 'password-updated')
                document.addEventListener('DOMContentLoaded', () => openModal('modal-password'));
            @endif
        </script>
    @endpush


</x-app-layout>
