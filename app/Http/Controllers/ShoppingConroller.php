<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class ShoppingConroller extends Controller
{
    public function add_to_cart() {
    
        $pdt = Product::findOrFail(request()->pr_id);
        $cartItem =Cart::add(
          $pdt->id,
            $pdt->name,
           request()->qty,
             $pdt->price);

             Cart::associate($cartItem->rowId, 'App\Product');

        return redirect(route('cart'));
    }
    public function cart () {
          
        return view('cart');
    }
    public function delete_cart($id) {
      Cart::remove($id);

      return redirect()->back();
    }

    public function ncr($id, $qty) {
      Cart::update($id, $qty + 1);
      return redirect()->back();
    }
    public function dcr($id, $qty) {
      Cart::update($id, $qty - 1);
      return redirect()->back();
    }
    public function rap_add($id)
     {
      $pdt = Product::findOrFail($id);
      $qty = request()->qty;
      $qty = 1;
      $cartItem =Cart::add(
        $pdt->id,
          $pdt->name,
          $qty,
           $pdt->price);

              Cart::associate($cartItem->rowId, 'App\Product');

          return redirect(route('cart'));
     }
}
