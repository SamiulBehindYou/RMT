<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class RepairController extends Controller
{
    public function repair(){
        $repairs = Repair::all();
        return view('admin.repair.repair', compact('repairs'));
    }

    public function repair_trash(){
        $repairs = Repair::onlyTrashed()->get();
        return view('admin.repair.trash', compact('repairs'));
    }

    public function repair_store(Request $request){
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,webp,gif,jpeg|max:2048',
            'description' => 'required',
        ],[
            'image.max' => 'Maximum 2MB accepted!',
        ]);

        $extension = $request->image->extension();
        $file_name = uniqid().'.'.$extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->image);
        $image->resize(500, 500);
        $image->save(public_path('uploads/repair/'.$file_name));

        Repair::create([
            'title' => $request->title,
            'image' => $file_name,
            'description' => $request->description,
        ]);

        return back()->withSuccess('Repair service added!');
    }

    public function repair_status($id){
        $repair = Repair::findOrFail($id);
        if($repair->status == 0){
            $repair->status = 1;
            $repair->save();
            return back()->withSuccess('Repair status deactivated!');
        }else{
            $repair->status = 0;
            $repair->save();
            return back()->withSuccess('Repair status activated!');
        }
    }

    public function repair_delete($id){
        Repair::findOrFail($id)->delete();
        return back()->withSuccess('Repair service deleted!');
    }

    public function repair_restore($id){
        Repair::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('Repair service restored!');
    }

    public function repair_per_delete($id){
        $repair = Repair::onlyTrashed()->findOrFail($id);
        unlink(public_path('uploads/repair/'.$repair->image));
        $repair->forceDelete();
        return back()->withSuccess('Repair service permanently deleted!');
    }
}
