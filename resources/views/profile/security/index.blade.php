<div class="space-y-8">
    <div class="settings-header-section mb-6">
        <div class="settings-header-info">
            <h2 class="settings-header-name">Login &amp; Security</h2>
            <p class="text-sm text-[var(--ink-muted)] mt-1">Manage your passwords, two-factor authentication, and connected accounts.</p>
        </div>
    </div>

    @include('profile.security.partials.primary-credentials')
    @include('profile.security.partials.two-factor-auth')
    @include('profile.security.partials.connected-accounts')
    @include('profile.security.partials.session-management')
    @include('profile.security.partials.security-alerts-log')
    @include('profile.security.partials.danger-zone')
</div>
