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
        <h1 class="text-3xl font-bold font-fraunces mb-8">Shopping Cart</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6">{{ session('success') }}</div>
        @endif

        @if($cartItems->isEmpty())
            <div class="bg-white p-8 rounded-lg shadow-sm text-center">
                <p class="text-gray-500 mb-4">Your cart is empty.</p>
                <a href="{{ route('product-catalog.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">Continue Shopping</a>
            </div>
        @else
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <ul class="divide-y divide-gray-200">
                            @foreach($cartItems as $item)
                                <li class="p-6 flex items-center space-x-6">
                                    <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
                                        @if($item->product->image)
                                            <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}" class="w-full h-full object-center object-cover">
                                        @else
                                            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">No Image</div>
                                        @endif
                                    </div>
                                    
                                    <div class="flex-1 flex flex-col justify-between">
                                        <div class="flex justify-between">
                                            <div>
                                                <h3 class="text-lg font-medium">
                                                    <a href="#" class="text-gray-900">{{ $item->product->name }}</a>
                                                </h3>
                                                <p class="mt-1 text-sm text-gray-500">{{ $item->product->category->name ?? '' }}</p>
                                            </div>
                                            <p class="text-lg font-semibold text-gray-900">${{ number_format($item->product->price, 2) }}</p>
                                        </div>
                                        
                                        <div class="mt-4 flex items-center justify-between">
                                            <form action="{{ route('cart.update', $item->product->id) }}" method="POST" class="flex items-center space-x-2">
                                                @csrf
                                                @method('PATCH')
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                <button type="submit" class="text-sm text-indigo-600 hover:text-indigo-900">Update</button>
                                            </form>
                                            
                                            <form action="{{ route('cart.remove', $item->product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-500">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-lg shadow-sm">
                        <h2 class="text-lg font-medium text-gray-900 mb-4">Order Summary</h2>
                        <div class="flow-root">
                            <dl class="-my-4 text-sm divide-y divide-gray-200">
                                <div class="py-4 flex items-center justify-between border-t border-gray-200 pt-4">
                                    <dt class="text-base font-medium text-gray-900">Subtotal</dt>
                                    <dd class="text-base font-medium text-gray-900">${{ number_format($subtotal, 2) }}</dd>
                                </div>
                            </dl>
                        </div>
                        
                        <div class="mt-6">
                            <a href="{{ route('checkout.index') }}" class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700">Checkout</a>
                        </div>
                        
                        <div class="mt-4 flex justify-center text-sm text-center text-gray-500">
                            <p>
                                or <a href="{{ route('product-catalog.index') }}" class="text-indigo-600 font-medium hover:text-indigo-500">Continue Shopping<span aria-hidden="true"> &rarr;</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @include('layouts.footer')
</body>
</html>
