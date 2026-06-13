<x-app-layout>
    <div class="min-h-[calc(100vh-70px)] bg-[var(--surface-warm)] flex flex-col items-center pt-[3rem] px-[1.5rem] pb-[4rem] max-[600px]:pt-[2rem] max-[600px]:px-[1rem] max-[600px]:pb-[3rem]">

        {{-- ═══════════════════════════════════════
             HERO — Avatar + User Info
        ═══════════════════════════════════════ --}}
        <div class="flex flex-col items-center gap-[1rem] mb-[2.5rem]">

            {{-- Spinning gradient ring + avatar --}}
            <div class="relative w-[110px] h-[110px] max-[600px]:w-[90px] max-[600px]:h-[90px] before:absolute before:-inset-[4px] before:rounded-full before:bg-[conic-gradient(from_0deg,var(--brand)_0%,var(--brand-mid)_40%,var(--gold)_70%,var(--brand)_100%)] before:animate-[spin_4s_linear_infinite] before:z-0">
                <div class="absolute inset-[4px] rounded-full bg-[var(--ink)] flex items-center justify-center z-10 overflow-hidden">
                    <span class="font-['DM_Sans',sans-serif] text-[2.2rem] max-[600px]:text-[1.8rem] font-bold text-[var(--surface)] uppercase tracking-[0.02em] leading-none select-none">
                        {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}
                    </span>
                </div>
            </div>

            {{-- Name & Email --}}
            <div>
                <h1 class="font-['DM_Sans',sans-serif] text-[1.5rem] max-[600px]:text-[1.25rem] font-bold text-[var(--ink)] tracking-[-0.02em] text-center m-0">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                </h1>
                <p class="font-['DM_Sans',sans-serif] text-[0.9rem] text-[var(--ink-muted)] text-center m-0">{{ Auth::user()->email }}</p>
            </div>

            {{-- Edit profile info trigger --}}
            <button
                class="inline-flex items-center gap-[0.4rem] px-[1.1rem] py-[0.45rem] rounded-full border-[1.5px] border-[var(--border)] bg-[var(--surface)] text-[var(--ink-soft)] font-['DM_Sans',sans-serif] text-[0.82rem] font-medium cursor-pointer transition-[background,border-color,color] duration-200 no-underline hover:bg-[var(--brand-light)] hover:border-[var(--brand)] hover:text-[var(--brand-dark)]"
                onclick="openModal('modal-profile-info')"
                id="btn-edit-profile-info"
                type="button"
            >
                <svg class="w-[14px] h-[14px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
                Edit Profile
            </button>
        </div>

        {{-- ═══════════════════════════════════════
             MENU CARDS
        ═══════════════════════════════════════ --}}
        <div class="w-full max-w-[480px] flex flex-col gap-[0.75rem]" role="list">

            <div class="font-['DM_Sans',sans-serif] text-[0.72rem] font-semibold text-[var(--ink-faint)] uppercase tracking-[0.09em] px-[0.25rem] pt-[0.25rem] pb-0 mt-[0.5rem]">Account Settings</div>

            {{-- Password & Security --}}
            <button
                class="group flex items-center gap-[1rem] py-[1.1rem] px-[1.25rem] bg-[var(--surface)] border border-[var(--border)] rounded-[var(--r)] no-underline text-[var(--ink)] cursor-pointer transition-all duration-[220ms] ease-[var(--ease-apple)] hover:bg-[var(--surface-warm)] hover:border-[var(--brand)] hover:shadow-[0_4px_20px_rgba(29,158,117,0.1)] hover:-translate-y-[1px] hover:text-[var(--ink)] active:translate-y-0"
                onclick="openModal('modal-password')"
                id="btn-password-security"
                type="button"
                role="listitem"
            >
                <div class="w-[42px] h-[42px] min-w-[42px] rounded-[12px] flex items-center justify-center transition-colors duration-[220ms] bg-[rgba(29,158,117,0.12)] text-[var(--brand)]">
                    <svg class="text-gray-900 w-[20px] h-[20px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-left font-['DM_Sans',sans-serif] text-[0.97rem] font-semibold text-[var(--ink)] m-0 mb-[0.15rem] leading-[1.3]">Password &amp; Security</p>
                    <p class="text-left font-['DM_Sans',sans-serif] text-[0.78rem] text-[var(--ink-muted)] m-0 leading-[1.4]">Change your password or manage 2FA</p>
                </div>
                <svg class="text-[var(--ink-faint)] transition-all duration-200 ease-[var(--ease-apple)] group-hover:translate-x-[3px] group-hover:text-[var(--brand)]" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
            </button>

            {{-- Payment Method --}}
            <button
                class="group flex items-center gap-[1rem] py-[1.1rem] px-[1.25rem] bg-[var(--surface)] border border-[var(--border)] rounded-[var(--r)] no-underline text-[var(--ink)] cursor-pointer transition-all duration-[220ms] ease-[var(--ease-apple)] hover:bg-[var(--surface-warm)] hover:border-[var(--brand)] hover:shadow-[0_4px_20px_rgba(29,158,117,0.1)] hover:-translate-y-[1px] hover:text-[var(--ink)] active:translate-y-0"
                onclick="openModal('modal-payment')"
                id="btn-payment-method"
                type="button"
                role="listitem"
            >
                <div class="w-[42px] h-[42px] min-w-[42px] rounded-[12px] flex items-center justify-center transition-colors duration-[220ms] bg-[rgba(212,165,116,0.15)] text-[var(--gold)]">
                    <svg class="text-gray-900 w-[20px] h-[20px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                        <line x1="1" y1="10" x2="23" y2="10"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-left font-['DM_Sans',sans-serif] text-[0.97rem] font-semibold text-[var(--ink)] m-0 mb-[0.15rem] leading-[1.3]">Payment Method</p>
                    <p class="text-left font-['DM_Sans',sans-serif] text-[0.78rem] text-[var(--ink-muted)] m-0 leading-[1.4]">Manage your saved cards &amp; billing</p>
                </div>
                <div class="flex items-center gap-[0.5rem]">
                    <span class="font-['DM_Sans',sans-serif] text-[0.68rem] font-semibold uppercase tracking-[0.07em] bg-[var(--brand-light)] text-[var(--brand-dark)] py-[0.2rem] px-[0.55rem] rounded-full">Soon</span>
                    <svg class="text-[var(--ink-faint)] transition-all duration-200 ease-[var(--ease-apple)] group-hover:translate-x-[3px] group-hover:text-[var(--brand)]" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </div>
            </button>

            <div class="font-['DM_Sans',sans-serif] text-[0.72rem] font-semibold text-[var(--ink-faint)] uppercase tracking-[0.09em] px-[0.25rem] pt-[0.25rem] pb-0 mt-[0.5rem]">Activity</div>

            {{-- Order History --}}
            <a
                href="{{ route('orders.index') }}"
                class="group flex items-center gap-[1rem] py-[1.1rem] px-[1.25rem] bg-[var(--surface)] border border-[var(--border)] rounded-[var(--r)] no-underline text-[var(--ink)] cursor-pointer transition-all duration-[220ms] ease-[var(--ease-apple)] hover:bg-[var(--surface-warm)] hover:border-[var(--brand)] hover:shadow-[0_4px_20px_rgba(29,158,117,0.1)] hover:-translate-y-[1px] hover:text-[var(--ink)] active:translate-y-0"
                id="btn-order-history"
                role="listitem"
            >
                <div class="w-[42px] h-[42px] min-w-[42px] rounded-[12px] flex items-center justify-center transition-colors duration-[220ms] bg-[rgba(29,158,117,0.12)] text-[var(--brand-dark)]">
                    <svg class="text-gray-900 w-[20px] h-[20px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10 9 9 9 8 9"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-left font-['DM_Sans',sans-serif] text-[0.97rem] font-semibold text-[var(--ink)] m-0 mb-[0.15rem] leading-[1.3]">Order History</p>
                    <p class="text-left font-['DM_Sans',sans-serif] text-[0.78rem] text-[var(--ink-muted)] m-0 leading-[1.4]">View all your past orders &amp; status</p>
                </div>
                <svg class="text-[var(--ink-faint)] transition-all duration-200 ease-[var(--ease-apple)] group-hover:translate-x-[3px] group-hover:text-[var(--brand)]" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
            </a>
            
            {{-- Address --}}
            <button
                class="group flex items-center gap-[1rem] py-[1.1rem] px-[1.25rem] bg-[var(--surface)] border border-[var(--border)] rounded-[var(--r)] no-underline text-[var(--ink)] cursor-pointer transition-all duration-[220ms] ease-[var(--ease-apple)] hover:bg-[var(--surface-warm)] hover:border-[var(--brand)] hover:shadow-[0_4px_20px_rgba(29,158,117,0.1)] hover:-translate-y-[1px] hover:text-[var(--ink)] active:translate-y-0"
                onclick="openModal('modal-address')"
                id="btn-address"
                type="button"
                role="listitem"
            >
                <div class="w-[42px] h-[42px] min-w-[42px] rounded-[12px] flex items-center justify-center transition-colors duration-[220ms] bg-[rgba(193,68,14,0.1)] text-[var(--coral)]">
                    <svg class="text-gray-900 w-[20px] h-[20px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-left font-['DM_Sans',sans-serif] text-[0.97rem] font-semibold text-[var(--ink)] m-0 mb-[0.15rem] leading-[1.3]">Address</p>
                    <p class="text-left font-['DM_Sans',sans-serif] text-[0.78rem] text-[var(--ink-muted)] m-0 leading-[1.4]">Manage your delivery addresses</p>
                </div>
                <div class="flex items-center gap-[0.5rem]">
                    <span class="font-['DM_Sans',sans-serif] text-[0.68rem] font-semibold uppercase tracking-[0.07em] bg-[var(--brand-light)] text-[var(--brand-dark)] py-[0.2rem] px-[0.55rem] rounded-full">Soon</span>
                    <svg class="text-[var(--ink-faint)] transition-all duration-200 ease-[var(--ease-apple)] group-hover:translate-x-[3px] group-hover:text-[var(--brand)]" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"/>
                    </svg>
                </div>
            </button>

        </div>{{-- /.profile-menu --}}

        {{-- ═══════════════════════════════════════
             LOG OUT BUTTON
        ═══════════════════════════════════════ --}}
        <form method="POST" action="{{ route('logout') }}" class="w-full max-w-[480px] mt-[1.75rem]">
            @csrf
            <button type="submit" class="w-full py-[0.9rem] px-[1.25rem] bg-transparent border-[1.5px] border-[rgba(216,90,48,0.3)] rounded-[var(--r)] text-[var(--coral)] font-['DM_Sans',sans-serif] text-[0.95rem] font-semibold cursor-pointer flex items-center justify-center gap-[0.5rem] transition-all duration-[220ms] ease-[var(--ease-apple)] no-underline hover:bg-[rgba(216,90,48,0.07)] hover:border-[var(--coral)] hover:shadow-[0_4px_20px_rgba(216,90,48,0.12)]" id="btn-logout">
                <svg class="w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
    <div class="fixed inset-0 bg-[rgba(13,13,11,0.55)] backdrop-blur-[4px] z-[999] p-[1.5rem] opacity-0 pointer-events-none transition-opacity duration-[350ms] [&.active]:opacity-100 [&.active]:pointer-events-auto group flex items-center justify-center" id="modal-profile-info" role="dialog" aria-modal="true" aria-labelledby="modal-profile-info-title">
        <div class="w-full max-w-[480px] bg-[var(--surface)] rounded-[var(--r-xl)] overflow-hidden shadow-[0_32px_80px_rgba(0,0,0,0.18)] transform translate-y-[40px] scale-[0.97] transition-all duration-[350ms] ease-[var(--ease-out-expo)] group-[.active]:translate-y-0 group-[.active]:scale-100">
            <div class="flex items-center justify-between py-[1.25rem] px-[1.5rem] border-b border-[var(--border)]">
                <h2 class="font-['DM_Sans',sans-serif] text-[1.05rem] font-bold text-[var(--ink)] m-0" id="modal-profile-info-title">Edit Profile</h2>
                <button class="w-[32px] h-[32px] rounded-full border-none bg-[var(--surface-mid)] flex items-center justify-center cursor-pointer text-[var(--ink-muted)] transition-colors duration-[180ms] shrink-0 hover:bg-[var(--brand-light)] hover:text-[var(--brand-dark)]" onclick="closeModal('modal-profile-info')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="p-[1.5rem]">
                @if (session('status') === 'profile-updated')
                    <div class="flex items-center gap-[0.5rem] py-[0.65rem] px-[1rem] bg-[var(--brand-light)] border border-[rgba(29,158,117,0.25)] rounded-[var(--r-sm)] text-[var(--brand-dark)] font-['DM_Sans',sans-serif] text-[0.85rem] font-medium mb-[1rem]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        Profile updated successfully!
                    </div>
                @endif

                <form method="post" action="{{ route('profile.update') }}" id="form-profile-info">
                    @csrf
                    @method('patch')

                    <div class="mb-[1.25rem]">
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

                    <div class="mb-[1.25rem]">
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

                    <div class="mb-[1.25rem]">
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

                    <div class="flex gap-[0.75rem] mt-[1.5rem]">
                        <button type="button" class="flex-1 py-[0.75rem] px-[1rem] bg-[var(--surface-mid)] text-[var(--ink-soft)] border-none rounded-[var(--r-sm)] font-['DM_Sans',sans-serif] text-[0.9rem] font-semibold cursor-pointer transition-colors duration-200 hover:bg-[var(--border)]" onclick="closeModal('modal-profile-info')">Cancel</button>
                        <button type="submit" class="flex-1 py-[0.75rem] px-[1rem] bg-[var(--brand)] text-white border-none rounded-[var(--r-sm)] font-['DM_Sans',sans-serif] text-[0.9rem] font-semibold cursor-pointer transition-colors duration-200 hover:bg-[var(--brand-dark)]">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════════════════════
         MODAL — Password & Security
    ═══════════════════════════════════════════════════════════ --}}
    <div class="fixed inset-0 bg-[rgba(13,13,11,0.55)] backdrop-blur-[4px] z-[999] p-[1.5rem] opacity-0 pointer-events-none transition-opacity duration-[350ms] [&.active]:opacity-100 [&.active]:pointer-events-auto group flex items-center justify-center" id="modal-password" role="dialog" aria-modal="true" aria-labelledby="modal-password-title">
        <div class="w-full max-w-[480px] bg-[var(--surface)] rounded-[var(--r-xl)] overflow-hidden shadow-[0_32px_80px_rgba(0,0,0,0.18)] transform translate-y-[40px] scale-[0.97] transition-all duration-[350ms] ease-[var(--ease-out-expo)] group-[.active]:translate-y-0 group-[.active]:scale-100">
            <div class="flex items-center justify-between py-[1.25rem] px-[1.5rem] border-b border-[var(--border)]">
                <h2 class="font-['DM_Sans',sans-serif] text-[1.05rem] font-bold text-[var(--ink)] m-0" id="modal-password-title">Password &amp; Security</h2>
                <button class="w-[32px] h-[32px] rounded-full border-none bg-[var(--surface-mid)] flex items-center justify-center cursor-pointer text-[var(--ink-muted)] transition-colors duration-[180ms] shrink-0 hover:bg-[var(--brand-light)] hover:text-[var(--brand-dark)]" onclick="closeModal('modal-password')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="p-[1.5rem]">
                @if (session('status') === 'password-updated')
                    <div class="flex items-center gap-[0.5rem] py-[0.65rem] px-[1rem] bg-[var(--brand-light)] border border-[rgba(29,158,117,0.25)] rounded-[var(--r-sm)] text-[var(--brand-dark)] font-['DM_Sans',sans-serif] text-[0.85rem] font-medium mb-[1rem]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
                        Password updated successfully!
                    </div>
                @endif

                <form method="post" action="{{ route('password.update') }}" id="form-password">
                    @csrf
                    @method('put')

                    <div class="mb-[1.25rem]">
                        <x-floating-input
                            id="update_password_current_password"
                            name="current_password"
                            type="password"
                            label="Current Password"
                            autocomplete="current-password"
                        />
                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    </div>

                    <div class="mb-[1.25rem]">
                        <x-floating-input
                            id="update_password_password"
                            name="password"
                            type="password"
                            label="New Password"
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    </div>

                    <div class="mb-[1.25rem]">
                        <x-floating-input
                            id="update_password_password_confirmation"
                            name="password_confirmation"
                            type="password"
                            label="Confirm New Password"
                            autocomplete="new-password"
                        />
                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex gap-[0.75rem] mt-[1.5rem]">
                        <button type="button" class="flex-1 py-[0.75rem] px-[1rem] bg-[var(--surface-mid)] text-[var(--ink-soft)] border-none rounded-[var(--r-sm)] font-['DM_Sans',sans-serif] text-[0.9rem] font-semibold cursor-pointer transition-colors duration-200 hover:bg-[var(--border)]" onclick="closeModal('modal-password')">Cancel</button>
                        <button type="submit" class="flex-1 py-[0.75rem] px-[1rem] bg-[var(--brand)] text-white border-none rounded-[var(--r-sm)] font-['DM_Sans',sans-serif] text-[0.9rem] font-semibold cursor-pointer transition-colors duration-200 hover:bg-[var(--brand-dark)]">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════════════════════
         MODAL — Payment Method (Coming Soon)
    ═══════════════════════════════════════════════════════════ --}}
    <div class="fixed inset-0 bg-[rgba(13,13,11,0.55)] backdrop-blur-[4px] z-[999] p-[1.5rem] opacity-0 pointer-events-none transition-opacity duration-[350ms] [&.active]:opacity-100 [&.active]:pointer-events-auto group flex items-center justify-center" id="modal-payment" role="dialog" aria-modal="true" aria-labelledby="modal-payment-title">
        <div class="w-full max-w-[480px] bg-[var(--surface)] rounded-[var(--r-xl)] overflow-hidden shadow-[0_32px_80px_rgba(0,0,0,0.18)] transform translate-y-[40px] scale-[0.97] transition-all duration-[350ms] ease-[var(--ease-out-expo)] group-[.active]:translate-y-0 group-[.active]:scale-100">
            <div class="flex items-center justify-between py-[1.25rem] px-[1.5rem] border-b border-[var(--border)]">
                <h2 class="font-['DM_Sans',sans-serif] text-[1.05rem] font-bold text-[var(--ink)] m-0" id="modal-payment-title">Payment Method</h2>
                <button class="w-[32px] h-[32px] rounded-full border-none bg-[var(--surface-mid)] flex items-center justify-center cursor-pointer text-[var(--ink-muted)] transition-colors duration-[180ms] shrink-0 hover:bg-[var(--brand-light)] hover:text-[var(--brand-dark)]" onclick="closeModal('modal-payment')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="text-center py-[2.5rem] px-[1.5rem]">
                <div class="w-[56px] h-[56px] rounded-[16px] bg-[rgba(212,165,116,0.15)] flex items-center justify-center mx-auto mb-[1.25rem] text-[var(--gold)]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                </div>
                <h3 class="font-['DM_Sans',sans-serif] text-[1.1rem] font-bold text-[var(--ink)] m-0 mb-[0.5rem]">Coming Soon</h3>
                <p class="font-['DM_Sans',sans-serif] text-[0.875rem] text-[var(--ink-muted)] m-0 mb-[1.5rem] leading-[1.6]">Payment method management is currently under development. We'll notify you when it's ready.</p>
                <button type="button" class="block max-w-[180px] mx-auto w-full py-[0.75rem] px-[1rem] bg-[var(--brand)] text-white border-none rounded-[var(--r-sm)] font-['DM_Sans',sans-serif] text-[0.9rem] font-semibold cursor-pointer transition-colors duration-200 hover:bg-[var(--brand-dark)]" onclick="closeModal('modal-payment')">Got it</button>
            </div>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════════════════════
         MODAL — Address (Coming Soon)
    ═══════════════════════════════════════════════════════════ --}}
    <div class="fixed inset-0 bg-[rgba(13,13,11,0.55)] backdrop-blur-[4px] z-[999] p-[1.5rem] opacity-0 pointer-events-none transition-opacity duration-[350ms] [&.active]:opacity-100 [&.active]:pointer-events-auto group flex items-center justify-center" id="modal-address" role="dialog" aria-modal="true" aria-labelledby="modal-address-title">
        <div class="w-full max-w-[480px] bg-[var(--surface)] rounded-[var(--r-xl)] overflow-hidden shadow-[0_32px_80px_rgba(0,0,0,0.18)] transform translate-y-[40px] scale-[0.97] transition-all duration-[350ms] ease-[var(--ease-out-expo)] group-[.active]:translate-y-0 group-[.active]:scale-100">
            <div class="flex items-center justify-between py-[1.25rem] px-[1.5rem] border-b border-[var(--border)]">
                <h2 class="font-['DM_Sans',sans-serif] text-[1.05rem] font-bold text-[var(--ink)] m-0" id="modal-address-title">Delivery Address</h2>
                <button class="w-[32px] h-[32px] rounded-full border-none bg-[var(--surface-mid)] flex items-center justify-center cursor-pointer text-[var(--ink-muted)] transition-colors duration-[180ms] shrink-0 hover:bg-[var(--brand-light)] hover:text-[var(--brand-dark)]" onclick="closeModal('modal-address')" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>
            <div class="text-center py-[2.5rem] px-[1.5rem]">
                <div class="w-[56px] h-[56px] rounded-[16px] bg-[rgba(216,90,48,0.1)] flex items-center justify-center mx-auto mb-[1.25rem] text-[var(--coral)]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <h3 class="font-['DM_Sans',sans-serif] text-[1.1rem] font-bold text-[var(--ink)] m-0 mb-[0.5rem]">Coming Soon</h3>
                <p class="font-['DM_Sans',sans-serif] text-[0.875rem] text-[var(--ink-muted)] m-0 mb-[1.5rem] leading-[1.6]">Address management is currently under development. You'll be able to save and manage multiple delivery addresses here.</p>
                <button type="button" class="block max-w-[180px] mx-auto w-full py-[0.75rem] px-[1rem] bg-[var(--brand)] text-white border-none rounded-[var(--r-sm)] font-['DM_Sans',sans-serif] text-[0.9rem] font-semibold cursor-pointer transition-colors duration-200 hover:bg-[var(--brand-dark)]" onclick="closeModal('modal-address')">Got it</button>
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
        document.querySelectorAll('[role="dialog"]').forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                if (e.target === this) {
                    closeModal(this.id);
                }
            });
        });

        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('[role="dialog"].active').forEach(overlay => {
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
