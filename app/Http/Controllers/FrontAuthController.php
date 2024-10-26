<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class FrontAuthController extends Controller
{
    public function login(){
        return view('frontend.auth.login');
    }
    public function register(){
        return view('frontend.auth.register');
    }

    public function register_store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ]);

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('customer.login')->withSuccess('You are register successfully!');
    }
}
