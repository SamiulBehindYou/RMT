<?php

namespace App\Livewire\Frontend;

use App\Models\Cart as ModelsCart;
use App\Models\Coupon;
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
            session()->flash('error', 'Minumum quantity reached!');
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

    public $coupon_code;
    public $coupon;
    public function CouponApply(){
        $this->validate([
            'coupon_code' => 'required|min_digits:6|max_digits:6',
        ]);

        $coupon = Coupon::where('coupon_id', $this->coupon_code);
        if($coupon->exists()){
            $coupon_data = $coupon->first();
            if($coupon_data->status == 0){
                $this->coupon = $coupon_data->discount;
                session()->flash('coupon_success', 'Coupon Applied!');
            }
            else{
                session()->flash('coupon_error', 'Coupon Already Applied!');
                return back();
            }
        }else{
            session()->flash('coupon_error', 'Coupon Not Exists!');
            return back();
        }
    }


    public function render()
    {
        $carts = ModelsCart::where('user_id', Auth::guard('customer')->user()->id)->with('rel_to_product')->where('checkout', 0)->get();
        //Sub Total and Total
        $sub_total = 0;
        foreach($carts as $cart){
            $sub_total += $cart->rel_to_product->price * $cart->quantity;
        }

        $coupon_discount = $this->coupon;

        if($this->coupon != null){
            $total = $sub_total - $coupon_discount;
        }else{
            $total = $sub_total;
        }


        return view('livewire.frontend.cart', compact('carts', 'sub_total', 'total', 'coupon_discount'));
    }
}
