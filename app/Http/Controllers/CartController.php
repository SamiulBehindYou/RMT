<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_cart($id){
        $product = Product::find($id);
        $cart = Cart::where('user_id', Auth::guard('customer')->user()->id)->where('product_id', $id)->where('checkout', 0);

        if($cart->exists()){
            $cart_q = $cart->first();
            $cart_q->quantity += 1;
            // $cart_q->total_price = $cart_q->price * $cart_q->quantity;
            $cart_q->save();
        }else{
            Cart::create([
                'user_id' => Auth::guard('customer')->user()->id,
                'product_id' => $id,
                // 'price' => $product->after_discount,
                'quantity' => 1,
                // 'total_price' => $product->after_discount,
            ]);
        }
        return back()->withSuccess('Product added to cart!');
    }

    public function checkout(){
        return abort(404);
    }
}
