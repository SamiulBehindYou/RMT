<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('admin.service.services', compact('services'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'icon' => 'required|mimes:svg',
        ]);

        $file_name = uniqid().'.'.$request->icon->extension();
        $request->icon->move(public_path('uploads/icons'), $file_name);

        Service::create([
            'title' => $request->title,
            'meta_title' => $request->meta_title,
            'icon' => $file_name,
        ]);

        return back()->withSuccess('Service added successfully!');
    }

    public function status($id){
        $service = Service::findOrFail($id);

        $service->status = !$service->status;
        $service->save();

        return back()->withSuccess('Service status changed successfully!');
    }

    public function delete($id){
        Service::findOrFail($id)->delete();

        return back()->withInfo('Service deleted successfully!');
    }
}
