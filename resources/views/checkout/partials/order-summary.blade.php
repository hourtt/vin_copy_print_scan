<div class="order-summary-card">
    <div class="summary-header">
        <h3>Order Summary</h3>
    </div>

    <!-- Static Mock Items based on reference image -->
    <div class="summary-items">
        <div class="summary-item">
            <div class="summary-item-img">
                <img src="{{ asset('storage/images/hero/hero1.jpg') }}" alt="ProX Toner" onerror="this.src='https://via.placeholder.com/60x60?text=Item'">
            </div>
            <div class="summary-item-details">
                <h4 class="summary-item-title">ProX High-Yield Toner Cartridge (Black)</h4>
                <div class="summary-item-qty">Qty: 2</div>
            </div>
            <div class="summary-item-price">$240.00</div>
        </div>

        <div class="summary-item">
            <div class="summary-item-img">
                <img src="{{ asset('storage/images/hero/hero2.jpg') }}" alt="Paper" onerror="this.src='https://via.placeholder.com/60x60?text=Item'">
            </div>
            <div class="summary-item-details">
                <h4 class="summary-item-title">Ultra-White Presentation Paper (500 sheets)</h4>
                <div class="summary-item-qty">Qty: 5</div>
            </div>
            <div class="summary-item-price">$85.00</div>
        </div>
    </div>

    <div class="summary-totals">
        <div class="totals-row">
            <span>Subtotal</span>
            <span x-text="`$` + subtotal.toFixed(2)">$325.00</span>
        </div>
        
        <div class="totals-row">
            <span>Shipping <span x-show="deliveryMethod === 'delivery'">(Standard)</span><span x-show="deliveryMethod === 'pickup'">(Pickup)</span></span>
            <span x-text="`$` + shippingCost.toFixed(2)">$15.00</span>
        </div>

        <div class="totals-row">
            <span>Tax (Estimated)</span>
            <span x-text="`$` + tax.toFixed(2)">$27.20</span>
        </div>

        <div class="totals-row grand-total">
            <span>Total</span>
            <span class="grand-total-amount" x-text="`$` + total.toFixed(2)">$367.20</span>
        </div>
    </div>

    <div class="checkout-action">
        <button type="submit" class="btn-place-order">
            PLACE ORDER 
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </button>
        <div class="secure-badge">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
            Secure encrypted transaction
        </div>
    </div>
</div>
