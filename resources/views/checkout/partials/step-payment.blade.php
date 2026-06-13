<div class="checkout-card">
    <div class="checkout-card-header">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
        <h2>Payment Method</h2>
    </div>

    <!-- Card Payment -->
    <label class="selectable-panel" :class="{ 'selected': paymentMethod === 'card' }" @click="paymentMethod = 'card'">
        <div class="panel-content">
            <div class="panel-radio"></div>
            <div class="panel-title">Credit / Debit Card</div>
        </div>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:var(--ink-muted);"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
    </label>

    <div x-show="paymentMethod === 'card'" x-transition class="payment-details">
        <div class="form-grid">
            <div class="form-group full-width">
                <label class="form-label">Card Number</label>
                <div style="position: relative;">
                    <input type="text" class="form-control" name="card_number" x-model="card.number" placeholder="0000 0000 0000 0000" style="padding-left: 2.5rem;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="position: absolute; left: 0.75rem; top: 50%; transform: translateY(-50%); color: var(--ink-muted);"><rect x="2" y="5" width="20" height="14" rx="2" ry="2"></rect><line x1="2" y1="10" x2="22" y2="10"></line></svg>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Expiry Date</label>
                <input type="text" class="form-control" name="card_expiry" x-model="card.expiry" placeholder="MM/YY">
            </div>

            <div class="form-group">
                <label class="form-label" style="display: flex; justify-content: space-between;">CVV <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:var(--ink-muted);"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg></label>
                <input type="text" class="form-control" name="card_cvv" x-model="card.cvv" placeholder="123">
            </div>
        </div>
    </div>

    <!-- Cash Payment (Only for Pickup) -->
    <label class="selectable-panel" :class="{ 'selected': paymentMethod === 'cash' }" @click="paymentMethod = 'cash'" x-show="deliveryMethod === 'pickup'" style="margin-top: 1rem;">
        <div class="panel-content">
            <div class="panel-radio"></div>
            <div class="panel-title">Cash on Pickup</div>
        </div>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:var(--ink-muted);"><rect x="2" y="6" width="20" height="12" rx="2"></rect><circle cx="12" cy="12" r="2"></circle><path d="M6 12h.01M18 12h.01"></path></svg>
    </label>
    
    <div x-show="paymentMethod === 'cash'" class="payment-details">
        <p style="font-size: 0.9rem; color: var(--ink-muted);">You will pay in cash when you arrive at our store to pick up your order.</p>
    </div>

    <!-- Invoice / Net 30 -->
    <label class="selectable-panel" :class="{ 'selected': paymentMethod === 'invoice' }" @click="paymentMethod = 'invoice'" style="margin-top: 1rem;">
        <div class="panel-content">
            <div class="panel-radio"></div>
            <div class="panel-title">Invoice / Purchase Order (Net 30)</div>
        </div>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color:var(--ink-muted);"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
    </label>

    <div style="margin-top: 2rem; display: flex; justify-content: space-between;">
        <button type="button" class="btn-outline" @click="prevStep" style="padding: 0.75rem 2rem; border: 1px solid var(--border); background: transparent; border-radius: 6px; font-weight: 500; cursor: pointer;">Back</button>
        <button type="button" class="btn-primary" @click="nextStep" style="padding: 0.75rem 2rem;">Continue to Review</button>
    </div>
</div>
