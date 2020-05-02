<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request) {
        $order = Order::find($request->id);
        $order->paid = true;
        $order->active = false;
        $order->activeDate = null;
        $order->expireDate = null;
        $order->save();
        return redirect('home');
    }

    public function payPage(Order $order) {
        $orderId = $order->id;
        return view('payment.pay-page', compact('orderId'));
    }
}
