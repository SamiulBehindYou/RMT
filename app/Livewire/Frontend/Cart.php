<?php

namespace App\Livewire\Frontend;

use App\Models\Cart as ModelsCart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public function Increment($id){
        $cart = ModelsCart::find($id);
        $cart->quantity += 1;
        $cart->total_price = $cart->price * $cart->quantity;
        $cart->save();
    }
    public function Decrement($id){
        $cart = ModelsCart::find($id);
        if($cart->quantity == 1){
            session()->flash('error', 'Product removed from cart!');
            return back();
        }else{
            $cart->quantity -= 1;
            $cart->total_price = $cart->price * $cart->quantity;
            $cart->save();
            return back();
        }
    }

    public function cartDelete($id){
        ModelsCart::find($id)->delete();
        session()->flash('delete_info', 'Product removed from cart!');
        return back();
    }
    public function render()
    {
        $carts = ModelsCart::where('user_id', Auth::guard('customer')->user()->id)->where('checkout', 0)->get();
        return view('livewire.frontend.cart', compact('carts'));
    }
}
