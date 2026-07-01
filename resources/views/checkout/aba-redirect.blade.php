<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to ABA PayWay...</title>
</head>
<body onload="document.getElementById('aba-form').submit();">
    <p>Redirecting to ABA PayWay for payment. Please wait...</p>
    <form id="aba-form" method="POST" action="{{ $url }}">
        <input type="hidden" name="req_time" value="{{ $req_time }}">
        <input type="hidden" name="merchant_id" value="{{ $merchant_id }}">
        <input type="hidden" name="tran_id" value="{{ $tran_id }}">
        <input type="hidden" name="amount" value="{{ $amount }}">
        <input type="hidden" name="items" value="{{ $items }}">
        <input type="hidden" name="hash" value="{{ $hash }}">
        <input type="hidden" name="firstname" value="{{ $firstname }}">
        <input type="hidden" name="lastname" value="{{ $lastname }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="return_url" value="{{ $return_url }}">
        <noscript>
            <button type="submit">Click here to continue</button>
        </noscript>
    </form>
</body>
</html>
