<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customers(){
        $customers = Customer::orderBy('id', 'DESC')->paginate(50);
        return view('admin.customers.customers', compact('customers'));
    }

    public function suspend($id){
        $customer = Customer::find($id);
        if($customer->status == 0){
            $customer->status = 1;
            $customer->save();
        }else{
            $customer->status = 0;
            $customer->save();
        }

        return back()->withSuccess('Status changed!');
    }

    public function profile(){
        return view('frontend.customer.profile');
    }
}
