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
    public function remove_brand($id){
        Brand::find($id)->delete();
        return back()->withSuccess('Brand successfully move to trush!');
    }

    public function trashed(){
        $brands = Brand::onlyTrashed()->get();
        return view('admin.brand.trashed_brand', compact('brands'));
    }

    public function restore_brand($id){
        Brand::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Brand successfully restored!');
    }
    public function delete_trashed_brand($id){
        Brand::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('Brand permanently deleted!');
    }
}
