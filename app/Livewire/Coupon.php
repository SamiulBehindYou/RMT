<?php

namespace App\Livewire;

use App\Models\Coupon as ModelsCoupon;
use Livewire\Component;

class Coupon extends Component
{
    public $discount;

    public function saveCoupon(){
        $this->validate([
            'discount' => 'required|numeric',
        ]);
        $coupon_code = rand(100000, 999999);
        ModelsCoupon::create([
            'coupon_id' => $coupon_code,
            'discount' => $this->discount,
        ]);
        $this->discount = '';
        
        session()->flash('coupon_add', 'Coupon created successfully!');

        return back();
    }

    public function deleteCoupon($id){
        ModelsCoupon::find($id)->delete();
        session()->flash('coupon_deleted', 'Coupon deleted successfully!');

        return back();
    }

    public function render()
    {
        $coupons = ModelsCoupon::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.coupon', compact('coupons'));
    }
}
