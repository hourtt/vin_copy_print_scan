<div class="space-y-8">
    <div class="mb-6">
        <div class="flex flex-col gap-2">
            <h2 class="text-2xl font-bold text-gray-900">Login &amp; Security</h2>
            <p class="text-sm text-gray-500 mt-1">Manage your passwords, two-factor authentication, and connected accounts.</p>
        </div>
    </div>

    @include('profile.security.partials.primary-credentials')
    @include('profile.security.partials.connected-accounts')
    {{-- @include('profile.security.partials.two-factor-auth') --}}
    {{-- @include('profile.security.partials.session-management') --}}
    {{-- @include('profile.security.partials.security-alerts-log') --}}
    {{-- @include('profile.security.partials.danger-zone') --}}
</div>