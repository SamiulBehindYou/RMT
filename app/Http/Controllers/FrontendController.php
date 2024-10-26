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
}
