<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AbaController extends Controller
{
    public function checkout(Order $order)
    {
        if ($order->user_id !== auth()->id() || $order->status !== 'pending') {
            abort(403);
        }

        $merchantId = config('payments.aba.merchant_id');
        $apiKey = config('payments.aba.api_key');
        $url = config('payments.aba.url');

        $reqTime = date('YmdHis');
        $tranId = str_pad($order->id, 8, '0', STR_PAD_LEFT);
        $amount = number_format(floatval($order->total), 2, '.', '');
        
        // Base64 encode the items
        $items = [];
        foreach ($order->items as $item) {
            $items[] = [
                'name' => $item->product->name,
                'quantity' => $item->quantity,
                'price' => number_format(floatval($item->unit_price), 2, '.', '')
            ];
        }
        $itemsBase64 = base64_encode(json_encode($items));

        $hashString = $reqTime . $merchantId . $tranId . $amount . $itemsBase64 /* . $shipping */ /* . $firstname */ /* etc */;
        // simplified hash for example
        $hash = base64_encode(hash_hmac('sha512', $reqTime . $merchantId . $tranId . $amount . $itemsBase64, $apiKey, true));

        return view('checkout.aba-redirect', [
            'url' => $url,
            'merchant_id' => $merchantId,
            'req_time' => $reqTime,
            'tran_id' => $tranId,
            'amount' => $amount,
            'items' => $itemsBase64,
            'hash' => $hash,
            'firstname' => $order->user->first_name,
            'lastname' => $order->user->last_name,
            'email' => $order->user->email,
            'return_url' => base64_encode(route('checkout.success', ['order' => $order->id])),
        ]);
    }

    public function webhook(Request $request)
    {
        // ABA webhook logic to verify the transaction
        $tranId = $request->input('tran_id');
        $status = $request->input('status');

        if ($status === 'APPROVED' && $tranId) {
            $orderId = intval($tranId);
            $order = Order::find($orderId);

            if ($order && $order->status === 'pending') {
                $order->update(['status' => 'processing']);
                
                foreach ($order->items as $orderItem) {
                    $orderItem->product->decrement('stock', $orderItem->quantity);
                }
            }
        }

        return response()->json(['status' => 'success']);
    }
}
