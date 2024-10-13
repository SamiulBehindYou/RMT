<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        $brands = Brand::all();
        $subcategories = SubCategory::all();
        $products = Product::orderBy('id', 'DESC')->paginate(20);

        return view('admin.product.product_index', [
            'tags' => $tags,
            'products' => $products,
            'brands' => $brands,
            'subcategories' => $subcategories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'product_id' => 'required|unique:products|integer',
            'brand' => 'required',
            'subcategory' => 'required',
            'made_in' => 'required',
            'tag_id' => 'required',
            'short_description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,webp,gif|max:5000',
            'description' => 'required',
        ]);

        $extention = $request->image->extension();
        $file_name = uniqid().'.'.$extention;
        // create new image instance (800 x 600)
            // Tumbnail
        $manager = new ImageManager(Driver::class);
        $image = $manager->read($request->image);
        $image->resize(300, 250);
        $image->save(public_path('uploads/products/tumbnail/'.$file_name));
            // Big Image
        $image = $manager->read($request->image);
        $image->cover(2000, 1500);
        $image->save(public_path('uploads/products/original/'.$file_name));

        // Convert tag array to String
        $tags = implode(',', $request->tag_id);



        Product::create([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'brand' => $request->brand,
            'subcategory' => $request->subcategory,
            'made_in' => $request->made_in,
            'tags' => $tags,
            'short_description' => $request->short_description,
            'image' => $file_name,
            'description' => $request->description,
        ]);

        return back()->withSuccess('Product Added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
