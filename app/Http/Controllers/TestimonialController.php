<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    public function testimonial(){
        $testimonials = Testimonial::all();
        return view('admin.testimonial.testimonials', compact('testimonials'));
    }
    public function testimonial_store(Request $request){
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'image' => 'required|mimes:png,jpg,webp,jpeg|max:2048',
            'message' => 'required|max:200',
        ],[
            'image.max' => 'Maximum 2MB accepted!',
        ]);

        $extension = $request->image->extension();
        $file_name = uniqid().'.'.$extension;

        // create image manager with desired driver
        $manager = new ImageManager(new Driver());

        // read image from file system
        $image = $manager->read($request->image);

        // resize image proportionally to 300px width
        $image->resize(300, 300);

        // save modified image in new format
        $image->save(public_path('uploads/testimonials/'.$file_name));

        Testimonial::create([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $file_name,
            'message' => $request->message,
        ]);

        return back()->withSuccess('Testimonials added successfully!');
    }

    public function testimonial_status($id){
        $testimonial = Testimonial::findOrFail($id);
        if($testimonial->status == 0){
            $testimonial->status = 1;
            $testimonial->save();
            return back()->withSuccess('Testimonials status Deactivated!');
        }else{
            $testimonial->status = 0;
            $testimonial->save();
            return back()->withSuccess('Testimonials status Active!');
        }
    }

    public function testimonial_delete($id){
        $testimonial = Testimonial::findOrFail($id);
        unlink(public_path('uploads/testimonials/'.$testimonial->image));
        $testimonial->delete();
        
        return back()->withSuccess('Testimonial Deleted!');
    }
}
