<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function customer_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $customer = Customer::where('email', $request->email);

        if($customer->exists()){
            if($customer->first()->status == 0){
                if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])){
                    return redirect('/')->withSuccess('Successfully Logged In.');
                }
                else{
                    return back()->withError('Customer information does not matched!');
                }
            }
            else{
                return back()->withInfo('Your account has been suspened!');
            }
        }
        else{
            return back()->withError('Email not registerd!');
        }
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ]);

        $customer = Auth::guard('customer')->user();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        // if($request->password){
        //     $customer->password = bcrypt($request->password);
        // }
        $customer->save();

        return response()->json([
            'status' => 200,
            'message' => 'Profile updated successfully',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/customer/login');
    }
}
