<?php

namespace App\Http\Controllers;

use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
//    public function step1(){
//        if (Auth::check()){
//            return redirect()->route('checkout.shipping');
//        }
//
//        return redirect('login');
//    }

    public function shipping()
    {
        return view('front.shipping-info');
    }

    public function payment()
    {
        return view('front.payment');
    }

    public function storePayment(Request $request)
    {
        \Stripe\Stripe::setApiKey("sk_test_j7FBBU7HntNSpnN2UVajwzxH");

        $token = $request->stripeToken;

        $total = Cart::total() * 100;

        // dd(round($total));

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $total,
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $token,
            ]);
        } catch (\Stripe\Error\Card $e) {
            // this card has been declined
        }
        // create the order
        Order::createOrder();

        return "Order complete";
        //
    }

}
