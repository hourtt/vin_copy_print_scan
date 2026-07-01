<div class="checkout-card">
    <div class="checkout-card-header">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
        <h2>Shipping Information</h2>
    </div>

    <!-- Delivery Method Selection -->
    <div style="margin-bottom: 2rem;">
        <label class="selectable-panel" :class="{ 'selected': deliveryMethod === 'delivery' }" @click="deliveryMethod = 'delivery'">
            <div class="panel-content">
                <div class="panel-radio"></div>
                <div class="panel-title">Home Delivery</div>
            </div>
        </label>

        <label class="selectable-panel" :class="{ 'selected': deliveryMethod === 'pickup' }" @click="deliveryMethod = 'pickup'">
            <div class="panel-content">
                <div class="panel-radio"></div>
                <div class="panel-title">Store Pickup</div>
            </div>
            <span style="font-size: 0.8rem; color: var(--ink-muted);">Free</span>
        </label>
    </div>

    <!-- Delivery Form -->
    <div x-show="deliveryMethod === 'delivery'" x-transition>
        <div class="form-grid">
            <div class="form-group full-width">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" x-model="customer.name" placeholder="Enter your full name">
                @error('customer_name')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="form-group full-width">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control @error('customer_phone') is-invalid @enderror" name="customer_phone" x-model="customer.phone" placeholder="Enter your phone number">
                @error('customer_phone')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="form-group full-width">
                <label class="form-label">Street Address</label>
                <input type="text" class="form-control @error('customer_address') is-invalid @enderror" name="customer_address" x-model="customer.address" placeholder="123 Industrial Parkway, Suite 400">
                @error('customer_address')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">City</label>
                <input type="text" class="form-control @error('customer_city') is-invalid @enderror" name="customer_city" x-model="customer.city" placeholder="Techville">
                @error('customer_city')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">ZIP / Postal Code</label>
                <input type="text" class="form-control @error('customer_zip') is-invalid @enderror" name="customer_zip" x-model="customer.zip" placeholder="90210">
                @error('customer_zip')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>

    <!-- Pickup Info -->
    <div x-show="deliveryMethod === 'pickup'" x-transition style="background: rgba(0, 86, 179, 0.03); padding: 1.5rem; border-radius: 8px; border: 1px solid var(--border);">
        <h4 style="font-weight: 600; margin-bottom: 0.5rem; color: var(--ink);">Vin Copy Print Scan</h4>
        <p style="font-size: 0.9rem; color: var(--ink-muted); margin-bottom: 0.25rem;">123 Main Street, Sihanoukville, Cambodia</p>
        <p style="font-size: 0.9rem; color: var(--ink-muted); margin-bottom: 0.25rem;">Phone: +855 12 345 678</p>
        <p style="font-size: 0.9rem; color: var(--ink-muted);">Hours: Mon-Fri 8am - 6pm | Sat 9am - 2pm</p>
    </div>

    <div style="margin-top: 2rem; display: flex; justify-content: flex-end;">
        <button type="button" class="btn-primary" @click="nextStep" style="padding: 0.75rem 2rem;">Continue to Payment</button>
    </div>
</div>
