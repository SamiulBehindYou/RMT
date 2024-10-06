<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function add_brand(){
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('admin.brand.add_brand', compact('brands'));
    }

    public function brands(){
        return view('admin.brand.brands');
    }

    public function store_brand(Request $request){
        $request->validate([
            'brand' => 'required|unique:brands',
        ]);

        Brand::insert([
            'brand' => $request->brand,
            'created_at' =>Carbon::now(),
        ]);
        return back()->withSuccess('Brand added Successfully!');
    }
    // public function delete_category($id){
    //     Category::find($id)->delete();
    //     return back()->withSuccess('Category successfully move to trush!');
    // }
    // public function restore_categroy($id){
    //     Category::onlyTrashed()->find($id)->restore();
    //     return back()->withSuccess('Category successfully restored!');
    // }
    // public function delete_trashed_categroy($id){
    //     $category = Category::onlyTrashed()->find($id);
    //     unlink(public_path('uploads/categories/'.$category->category_image));

    //     Category::onlyTrashed()->find($id)->forceDelete();
    //     return back()->withSuccess('Category permanently deleted!');
    // }
}
