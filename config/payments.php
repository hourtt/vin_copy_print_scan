<?php

return [
    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),
    ],
    'aba' => [
        'merchant_id' => env('ABA_PAYWAY_MERCHANT_ID'),
        'api_key' => env('ABA_PAYWAY_API_KEY'),
        'url' => env('ABA_PAYWAY_URL', 'https://checkout-sandbox.payway.com.kh/api/payment-gateway/v1/payments/purchase'),
    ],
];
