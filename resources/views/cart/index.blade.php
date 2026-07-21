<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart — {{ config('app.name', 'PrintCo') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,900i&family=dm-sans:300,400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    @include('layouts.navigation')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Breadcrumb Navigation -->
        <nav class="flex text-sm text-gray-500 mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center hover:text-gray-900 transition-colors">
                        Dashboard
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <a href="{{ route('product-catalog.index') }}" class="hover:text-gray-900 transition-colors">Products</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <span class="text-indigo-600 font-medium">Shopping Cart</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
            <h1 class="text-3xl font-bold font-fraunces text-gray-900">Shopping Cart</h1>
            <a href="{{ route('dashboard') }}" class="mt-4 sm:mt-0 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Dashboard
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded-lg mb-6 shadow-sm">{{ session('success') }}</div>
        @endif

        @if($cartItems->isEmpty())
            <div class="bg-white p-12 rounded-xl shadow-sm text-center border border-gray-100">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-6">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h2 class="text-xl font-medium text-gray-900 mb-2">Your cart is empty</h2>
                <p class="text-gray-500 mb-8">Looks like you haven't added any products to your cart yet.</p>
                <a href="{{ route('product-catalog.index') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-md font-medium text-white hover:bg-indigo-700 shadow-sm transition-colors duration-200">
                    Continue Shopping
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <!-- Left Column (Product List) -->
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                            <h2 class="text-lg font-medium text-gray-900">Items in your cart</h2>
                        </div>
                        <ul class="divide-y divide-gray-100">
                            @foreach($cartItems as $item)
                                <li class="p-6 flex flex-col sm:flex-row sm:items-center gap-6 hover:bg-gray-50/50 transition-colors">
                                    <div class="flex-shrink-0 w-24 h-24 sm:w-32 sm:h-32 border border-gray-100 rounded-lg overflow-hidden bg-gray-50">
                                        @if($item->product->image)
                                            <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-center object-cover" loading="lazy">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">No Image</div>
                                        @endif
                                    </div>
                                    
                                    <div class="flex-1 flex flex-col justify-between">
                                        <div class="flex justify-between items-start">
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-900">
                                                    <a href="#" class="hover:text-indigo-600 transition-colors">{{ $item->product->name }}</a>
                                                </h3>
                                                <p class="mt-1 text-sm text-gray-500">{{ $item->product->category->name ?? 'Uncategorized' }}</p>
                                            </div>
                                            <p class="text-lg font-bold text-gray-900">${{ number_format($item->product->price, 2) }}</p>
                                        </div>
                                        
                                        <div class="mt-6 flex items-center justify-between">
                                            <form x-data="{ 
                                                    qty: {{ $item->quantity }},
                                                    loading: false,
                                                    async updateCart() {
                                                        if (this.qty < 1) return;
                                                        this.loading = true;
                                                        try {
                                                            let formData = new FormData(this.$refs.updateForm);
                                                            let response = await fetch(this.$refs.updateForm.action, {
                                                                method: 'POST',
                                                                body: formData,
                                                                headers: { 'X-Requested-With': 'XMLHttpRequest' }
                                                            });
                                                            if (response.ok) {
                                                                let html = await response.text();
                                                                let doc = new DOMParser().parseFromString(html, 'text/html');
                                                                
                                                                // Update Order Summary
                                                                let newSummary = doc.querySelector('#order-summary-card');
                                                                if (newSummary) document.querySelector('#order-summary-card').innerHTML = newSummary.innerHTML;
                                                                
                                                                // Update Nav Badge globally
                                                                let inputs = doc.querySelectorAll('input[name=\'quantity\']');
                                                                let newCount = 0;
                                                                inputs.forEach(input => newCount += parseInt(input.value || 0));
                                                                window.dispatchEvent(new CustomEvent('cart-updated', { detail: { count: newCount } }));
                                                            }
                                                        } catch(e) {
                                                            console.error('Update failed', e);
                                                        } finally {
                                                            this.loading = false;
                                                        }
                                                    }
                                                }" 
                                                x-ref="updateForm" action="{{ route('cart.update', $item->product->id) }}" method="POST" class="flex items-center"
                                                @submit.prevent="updateCart()">
                                                @csrf
                                                @method('PATCH')
                                                <div class="flex items-center border border-gray-200 rounded-full bg-white overflow-hidden shadow-sm h-9 relative">
                                                    
                                                    <!-- Loading Overlay inside Stepper -->
                                                    <div x-show="loading" class="absolute inset-0 bg-white/80 flex items-center justify-center z-10" style="display: none;">
                                                        <svg class="animate-spin h-4 w-4 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                                    </div>

                                                    <button type="button" 
                                                            class="w-9 h-full flex items-center justify-center text-gray-500 hover:bg-gray-50 focus:outline-none transition-colors"
                                                            :class="{ 'opacity-50 cursor-not-allowed': qty <= 1 || loading, 'hover:text-gray-900': qty > 1 && !loading }"
                                                            :disabled="qty <= 1 || loading"
                                                            @click="if(qty > 1 && !loading) { qty--; updateCart(); }">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4"></path></svg>
                                                    </button>
                                                    
                                                    <input type="number" name="quantity" x-model.number="qty" min="1" 
                                                           class="w-10 h-full border-0 text-center text-sm font-medium text-gray-900 focus:ring-0 p-0 bg-transparent [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" 
                                                           :disabled="loading"
                                                           @change="if(qty >= 1 && !loading) updateCart();">
                                                           
                                                    <button type="button" 
                                                            class="w-9 h-full flex items-center justify-center text-gray-500 hover:bg-gray-50 hover:text-gray-900 focus:outline-none transition-colors"
                                                            :disabled="loading"
                                                            @click="if(!loading) { qty++; updateCart(); }">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                                                    </button>
                                                </div>
                                            </form>
                                            
                                            <div x-data="{ showConfirm: false }">
                                                <form x-ref="removeForm" action="{{ route('cart.remove', $item->product->id) }}" method="POST" @submit.prevent="showConfirm = true">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 transition-colors flex items-center group">
                                                        <svg class="w-4 h-4 mr-1 text-red-500 group-hover:text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        Remove
                                                    </button>
                                                </form>

                                                <!-- Confirmation Modal -->
                                                <div x-show="showConfirm" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" style="display: none;">
                                                    <div x-show="showConfirm" x-transition.opacity class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                                                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                                                            <div x-show="showConfirm" @click.away="showConfirm = false" x-transition class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                                                    <div class="sm:flex sm:items-start">
                                                                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                                            </svg>
                                                                        </div>
                                                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                                                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Remove Item</h3>
                                                                            <div class="mt-2">
                                                                                <p class="text-sm text-gray-500">Are you sure you want to remove this item from your cart?</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                                                    <button type="button" @click="$refs.removeForm.submit()" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Yes, Remove</button>
                                                                    <button type="button" @click="showConfirm = false" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel / Keep Item</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Right Column (Sidebar Panels) -->
                <div class="lg:col-span-4 space-y-6">
                    
                    <!-- Coupon Code Card -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Have a coupon?</h3>
                        <form action="#" method="POST" class="flex gap-2">
                            @csrf
                            <input type="text" name="coupon" placeholder="Coupon code" class="flex-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <button type="submit" class="px-4 py-2 bg-gray-900 border border-transparent rounded-md font-medium text-white hover:bg-gray-800 shadow-sm text-sm transition-colors">Apply</button>
                        </form>
                    </div>

                    <!-- Order Summary Card -->
                    <div id="order-summary-card" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h2 class="text-lg font-medium text-gray-900 mb-6">Order Summary</h2>
                        <dl class="space-y-4 text-sm text-gray-600">
                            <div class="flex justify-between">
                                <dt>Subtotal</dt>
                                <dd class="font-medium text-gray-900">${{ number_format($subtotal, 2) }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Shipping estimate</dt>
                                <dd class="font-medium text-gray-900">Calculated at checkout</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Tax estimate</dt>
                                <dd class="font-medium text-gray-900">Calculated at checkout</dd>
                            </div>
                            <div class="pt-4 flex items-center justify-between border-t border-gray-100">
                                <dt class="text-base font-bold text-gray-900">Order Total</dt>
                                <dd class="text-lg font-bold text-gray-900">${{ number_format($subtotal, 2) }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Payment Method Card -->
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-900 uppercase tracking-wider mb-4">Proceed</h3>
                        <a href="{{ route('checkout.index') }}" class="w-full flex justify-center items-center px-6 py-4 border border-transparent rounded-md shadow-sm text-base font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                            Check Out
                        </a>
                        <div class="mt-4 flex flex-col items-center gap-2">
                            <div class="flex space-x-2 opacity-60">
                                <!-- Minimalistic Payment Icons placeholders -->
                                <svg class="h-6 w-auto" viewBox="0 0 38 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="38" height="24" rx="4" fill="#E5E7EB"/><path d="M19 12H11" stroke="#9CA3AF" stroke-width="2" stroke-linecap="round"/></svg>
                                <svg class="h-6 w-auto" viewBox="0 0 38 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="38" height="24" rx="4" fill="#E5E7EB"/><circle cx="15" cy="12" r="4" fill="#9CA3AF"/><circle cx="23" cy="12" r="4" fill="#6B7280" fill-opacity="0.8"/></svg>
                                <svg class="h-6 w-auto" viewBox="0 0 38 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="38" height="24" rx="4" fill="#E5E7EB"/><path d="M12 10L19 14L26 10" stroke="#9CA3AF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>
</body>
</html>
