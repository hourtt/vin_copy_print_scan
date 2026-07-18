<div class="settings-row-group">
    <h3 class="settings-section-title">Primary Credentials</h3>
    <div class="settings-row">
        <div class="settings-row-label">Email Address</div>
        <div class="settings-row-value">{{ Auth::user()->email }}</div>
        <div class="settings-row-action"><button class="btn-edit-link">Change</button></div>
    </div>
    <div class="settings-row">
        <div class="settings-row-label">Password</div>
        <div class="settings-row-value">********</div>
        <div class="settings-row-action"><button class="btn-edit-link">Update</button></div>
    </div>
</div>
