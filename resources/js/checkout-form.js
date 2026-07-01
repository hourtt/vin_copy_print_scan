document.addEventListener('alpine:init', () => {
    Alpine.data('checkoutForm', (initialData = {}) => ({
        step: 1,
        deliveryMethod: 'delivery', // pickup | delivery
        paymentMethod: 'stripe',    // cod | stripe | aba
        customer: {
            name: '',
            phone: '',
            address: '',
            city: '',
            zip: ''
        },
        card: { // Kept for UI visual purposes if they type, but Stripe will handle real input
            number: '',
            expiry: '',
            cvv: ''
        },
        
        baseSubtotal: initialData.subtotal || 0,
        baseShippingCost: initialData.shippingCost || 15.00,

        get shippingCost() {
            return this.deliveryMethod === 'delivery' ? this.baseShippingCost : 0.00;
        },
        get subtotal() {
            return this.baseSubtotal;
        },
        get tax() {
            return 0; // Or calculate if needed
        },
        get total() {
            return this.subtotal + this.shippingCost + this.tax;
        },

        nextStep() {
            // Simple Validation before proceeding
            if (this.step === 1) {
                if (this.deliveryMethod === 'delivery') {
                    if (!this.customer.name || !this.customer.phone || !this.customer.address || !this.customer.city) {
                        alert("Please fill in all delivery details.");
                        return;
                    }
                    // Force stripe/aba payment for delivery, COD is only for pickup if desired
                    // this.paymentMethod = 'stripe';
                }
            } else if (this.step === 2) {
                // We won't validate card here as Stripe Checkout handles it server-side via redirect
            }

            if (this.step < 3) this.step++;
            window.scrollTo({top: 0, behavior: 'smooth'});
        },
        prevStep() {
            if (this.step > 1) this.step--;
            window.scrollTo({top: 0, behavior: 'smooth'});
        }
    }))
});
