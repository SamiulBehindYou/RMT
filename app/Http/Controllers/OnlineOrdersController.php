<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OnlineOrdersController extends Controller
{
    public function online_sales(){
        $orders = Order::orderBy('id', 'DESC')->paginate(10);
        return view('admin.sales.online_sales', compact('orders'));
    }
}
