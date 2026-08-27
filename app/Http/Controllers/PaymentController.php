<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food\Checkout;
use App\Models\Food\Cart;

class PaymentController extends Controller
{
    // عرض صفحة الدفع
    public function showPaymentPage($order_id)
    {
        $order = Checkout::findOrFail($order_id);
        return view('foods.payment', compact('order'));
    }

    // تنفيذ عند نجاح الدفع
    public function paypalSuccess($id)
{
    $checkout = Checkout::find($id);

    if ($checkout && $checkout->status === 'pending') {
        $checkout->status = 'delivered';
        $checkout->save();

        // حذف كارت المستخدم
        Cart::where('user_id', $checkout->user_id)->delete();

        return response()->json(['status' => 'success']);
    }

    return response()->json(['status' => 'error']);
}
}
