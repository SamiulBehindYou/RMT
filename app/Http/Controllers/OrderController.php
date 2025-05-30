<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orders(){
        $orders = Order::where('user_id', Auth::guard('customer')->user()->id)->whereIn('status', ['Processing', 'Completed'])->get();
        return view('frontend.order.orders', compact('orders'));
    }
}
