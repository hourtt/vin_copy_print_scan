document.addEventListener('alpine:init', () => {
    Alpine.data('checkout', (initialSubtotal, initialShippingMethods) => ({
        subtotal: parseFloat(initialSubtotal) || 0,
        shippingMethods: initialShippingMethods || [],
        selectedMethodId: (initialShippingMethods && initialShippingMethods.length > 0) ? initialShippingMethods[0].id : null,
        
        get shippingFee() {
            const method = this.shippingMethods.find(m => m.id == this.selectedMethodId);
            return method ? parseFloat(method.fee) : 0;
        },
        
        get total() {
            return this.subtotal + this.shippingFee;
        },
        
        formatPrice(amount) {
            return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(amount);
        }
    }));
});
