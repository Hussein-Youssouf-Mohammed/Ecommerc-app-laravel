<?php

namespace App\Http\Controllers;
use \Stripe\Stripe;
use Gloudemans\Shoppingcart\Facades\Cart;
use \Stripe\Charge;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() 
    {
         return view('checkout');
    }
    public function pay() {
      
        Stripe::setApiKey("sk_test_BzcfGDAVwQw9efuWp2eVvyVg");
        $charge  = Charge::create([
            'amount' => Cart::total(),
            'currency' => 'sudan',
            'description' => 'first ecommerce in app',
            'source' => request()->stripeToken
        ]);
        dd('You card was charge successfully. ');
    }
}
