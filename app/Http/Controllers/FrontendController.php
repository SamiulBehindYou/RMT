<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Repair;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::inRandomOrder()->  paginate(20);
        $categories = Category::all();
        $brands = Brand::all();
        $testimonials = Testimonial::all();
        return view('frontend.dashboard.index', compact('products', 'categories', 'brands', 'testimonials'));
    }
    public function shop(){
        $products = Product::inRandomOrder()->  paginate(20);
        return view('frontend.shop.view_product', compact('products'));
    }

    public function aboutus(){
        return view('frontend.about.about');
    }

    public function services(){
        $services = Service::all();
        return view('frontend.services.services', compact('services'));
    }

    public function by_category($id){
        $category_id = $id;
        $products = Product::inRandomOrder()->paginate(20);
        return view('frontend.dashboard.by_category', compact('products', 'category_id'));
    }

    public function by_brand($id){
        $products = Product::where('brand', $id)->inRandomOrder()->paginate(20);
        return view('frontend.dashboard.by_brand', compact('products'));
    }

    public function single_product($id){
        $product = Product::find($id);
        return view('frontend.dashboard.single_product', compact('product'));
    }

    public function view_repair(){
        $repairs = Repair::where('status', 0)->paginate(20);
        return view('frontend.repair.repair', compact('repairs'));
    }
}
