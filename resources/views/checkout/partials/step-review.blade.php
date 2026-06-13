<div class="checkout-card">
    <div class="checkout-card-header">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
        <h2>Order Review</h2>
    </div>

    <div style="background: rgba(0, 86, 179, 0.03); border: 1px solid var(--border); border-radius: 8px; padding: 1.5rem; margin-bottom: 1.5rem;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
            
            <!-- Delivery Info Summary -->
            <div>
                <h4 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--ink-faint); margin-bottom: 0.75rem;">Delivery Method</h4>
                <template x-if="deliveryMethod === 'delivery'">
                    <div>
                        <p style="font-weight: 600; color: var(--ink); margin-bottom: 0.25rem;">Home Delivery</p>
                        <p style="font-size: 0.9rem; color: var(--ink-muted);" x-text="customer.name"></p>
                        <p style="font-size: 0.9rem; color: var(--ink-muted);" x-text="customer.address"></p>
                        <p style="font-size: 0.9rem; color: var(--ink-muted);"><span x-text="customer.city"></span>, <span x-text="customer.zip"></span></p>
                    </div>
                </template>
                <template x-if="deliveryMethod === 'pickup'">
                    <div>
                        <p style="font-weight: 600; color: var(--ink); margin-bottom: 0.25rem;">Store Pickup</p>
                        <p style="font-size: 0.9rem; color: var(--ink-muted);">Vin Copy Print Scan</p>
                        <p style="font-size: 0.9rem; color: var(--ink-muted);">123 Main Street</p>
                        <p style="font-size: 0.9rem; color: var(--ink-muted);">Sihanoukville, Cambodia</p>
                    </div>
                </template>
                <button type="button" @click="step = 1" style="background: none; border: none; color: var(--brand); font-size: 0.85rem; font-weight: 500; cursor: pointer; padding: 0; margin-top: 0.5rem; text-decoration: underline;">Edit</button>
            </div>

            <!-- Payment Info Summary -->
            <div>
                <h4 style="font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--ink-faint); margin-bottom: 0.75rem;">Payment Method</h4>
                <template x-if="paymentMethod === 'card'">
                    <div>
                        <p style="font-weight: 600; color: var(--ink); margin-bottom: 0.25rem;">Credit / Debit Card</p>
                        <p style="font-size: 0.9rem; color: var(--ink-muted);">Card ending in <span x-text="card.number.slice(-4)"></span></p>
                    </div>
                </template>
                <template x-if="paymentMethod === 'cash'">
                    <div>
                        <p style="font-weight: 600; color: var(--ink); margin-bottom: 0.25rem;">Cash on Pickup</p>
                        <p style="font-size: 0.9rem; color: var(--ink-muted);">Pay at the store</p>
                    </div>
                </template>
                <template x-if="paymentMethod === 'invoice'">
                    <div>
                        <p style="font-weight: 600; color: var(--ink); margin-bottom: 0.25rem;">Invoice (Net 30)</p>
                    </div>
                </template>
                <button type="button" @click="step = 2" style="background: none; border: none; color: var(--brand); font-size: 0.85rem; font-weight: 500; cursor: pointer; padding: 0; margin-top: 0.5rem; text-decoration: underline;">Edit</button>
            </div>

        </div>
    </div>

    <div style="margin-top: 2rem; display: flex; justify-content: space-between;">
        <button type="button" class="btn-outline" @click="prevStep" style="padding: 0.75rem 2rem; border: 1px solid var(--border); background: transparent; border-radius: 6px; font-weight: 500; cursor: pointer;">Back</button>
        <!-- For the form submission we don't need a button here since the main "Place Order" button is in the sidebar, but we can add one here too -->
    </div>
</div>
