<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Cancelled | {{ config('app.name', 'Vin Copy Print Scan') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-xl shadow-sm text-center max-w-md w-full">
        <div class="w-16 h-16 bg-red-100 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </div>
        <h2 class="text-2xl font-bold mb-2">Payment Cancelled</h2>
        <p class="text-gray-500 mb-6">Your payment was cancelled or failed. Your order #{{ str_pad($order->id, 8, '0', STR_PAD_LEFT) }} has not been processed.</p>
        <div class="flex flex-col gap-3">
            <a href="{{ route('checkout.index') }}" class="w-full bg-brand text-white py-3 rounded-lg font-medium">Try Again</a>
            <a href="{{ url('/') }}" class="w-full bg-gray-100 text-gray-700 py-3 rounded-lg font-medium">Return to Home</a>
        </div>
    </div>
</body>
</html>
