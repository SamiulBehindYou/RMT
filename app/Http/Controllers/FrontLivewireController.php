<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontLivewireController extends Controller
{
    public function cart(){
        return view('frontend.cart.cart');
    }
}
