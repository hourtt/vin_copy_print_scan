document.addEventListener('alpine:init', () => {
    Alpine.data('checkoutForm', () => ({
        step: 1,
        deliveryMethod: 'delivery', // pickup | delivery
        paymentMethod: 'card',    // cash | card
        customer: {
            name: 'Jane Doe',
            address: '123 Industrial Parkway, Suite 400',
            city: 'Techville',
            zip: '90210'
        },
        card: {
            number: '',
            expiry: '',
            cvv: ''
        },
        
        get shippingCost() {
            return this.deliveryMethod === 'delivery' ? 15.00 : 0.00;
        },
        get subtotal() {
            return 325.00; // Mock subtotal
        },
        get tax() {
            return (this.subtotal + this.shippingCost) * 0.08; // 8% mock tax
        },
        get total() {
            return this.subtotal + this.shippingCost + this.tax;
        },

        nextStep() {
            // Simple Validation before proceeding
            if (this.step === 1) {
                if (this.deliveryMethod === 'delivery') {
                    if (!this.customer.name || !this.customer.address || !this.customer.city) {
                        alert("Please fill in all delivery details.");
                        return;
                    }
                    // Force card payment for delivery
                    this.paymentMethod = 'card';
                }
            } else if (this.step === 2) {
                if (this.paymentMethod === 'card') {
                    if (!this.card.number || !this.card.expiry || !this.card.cvv) {
                        alert("Please enter your card details.");
                        return;
                    }
                }
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
