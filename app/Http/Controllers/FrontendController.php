<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->  paginate(20);
        return view('frontend.index', compact('products'));
    }
    public function shop(){
        $products = Product::inRandomOrder()->  paginate(20);
        return view('frontend.shop.view_product', compact('products'));
    }

    public function aboutus(){
        return view('frontend.about.about');
    }

    public function services(){
        return view('frontend.services.services');
    }

    public function contact(){
        return view('frontend.contact.contact');
    }
}
