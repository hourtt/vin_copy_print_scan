<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Success | {{ config('app.name', 'Vin Copy Print Scan') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700,900i&family=dm-sans:300,400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="checkout-page" style="display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; background: var(--surface-warm);">
    
    <div style="background: #fff; border: 1px solid var(--border); border-radius: var(--r-xl); padding: 4rem; text-align: center; max-width: 600px; width: 100%; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
        
        <div style="width: 80px; height: 80px; background: rgba(15, 110, 86, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem;">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#0f6e56" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </div>

        <h1 style="font-family: 'Noto Sans Khmer', sans-serif; font-size: 2.5rem; color: var(--ink); margin-bottom: 1rem;">Order Placed Successfully!</h1>
        <p style="font-size: 1.1rem; color: var(--ink-muted); line-height: 1.6; margin-bottom: 2.5rem;">
            Thank you for your order. We've sent a confirmation email to you with the order details and tracking information.
        </p>

        <div style="background: var(--surface-warm); border-radius: 8px; padding: 1.5rem; margin-bottom: 2.5rem; text-align: left;">
            <p style="font-size: 0.9rem; color: var(--ink-muted); margin-bottom: 0.5rem;">Order Reference:</p>
            <p style="font-family: monospace; font-size: 1.25rem; font-weight: 700; color: var(--ink); letter-spacing: 2px;">VCP-{{ strtoupper(Str::random(8)) }}</p>
        </div>

        <a href="{{ url('/') }}" class="btn-primary" style="padding: 1rem 3rem; text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Return to Dashboard
        </a>

    </div>

</body>
</html>
