<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class BasicSettingsController extends Controller
{
    public function basic_settings(){
        $settings = BasicSettings::first();
        return view('admin.basic_settings.basic_settings', compact('settings'));
    }

    public function title(Request $request){
        $request->validate([
            'web_title' => 'required|max:50'
        ]);

        BasicSettings::first()->update([
            'web_title' => $request->web_title,
        ]);
        return back()->withSuccess('Title updated successfully!');
    }
    public function tag_line(Request $request){
        $request->validate([
            'web_tag_line' => 'required|max:450'
        ]);

        BasicSettings::first()->update([
            'web_tag_line' => $request->web_tag_line,
        ]);
        return back()->withSuccess('Tag Line updated successfully!');
    }

    public function icon(Request $request){
        $request->validate([
            'icon' => 'required|max:2048|mimes:png'
        ],[
            'icon.max' => 'Maximum 2MB!',
        ]);

        $icon = BasicSettings::first();
        if($icon->icon != null){
            unlink(public_path('uploads/settings/icon/'.$icon->icon));
        }


        $extension = $request->icon->extension();
        $file_name = uniqid().'.'.$extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->icon);
        $image->resize(300, 300);
        $image->save(public_path('uploads/settings/icon/'.$file_name));

        BasicSettings::first()->update([
            'icon' => $file_name,
        ]);
        return back()->withSuccess('Icon updated successfully!');
    }

    public function landing_image(Request $request){
        $request->validate([
            'landing_image' => 'required|max:4096|mimes:png'
        ],[
            'landing_image.max' => 'Maximum 4MB!',
        ]);

        $landing_image = BasicSettings::first();
        if($landing_image->landing_image != null){
            unlink(public_path('uploads/settings/landing_image/'.$landing_image->landing_image));
        }


        $extension = $request->landing_image->extension();
        $file_name = uniqid().'.'.$extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->landing_image);
        $image->resize(900, 900);
        $image->save(public_path('uploads/settings/landing_image/'.$file_name));

        BasicSettings::first()->update([
            'landing_image' => $file_name,
        ]);
        return back()->withSuccess('Landing image updated successfully!');
    }

    public function logo(Request $request){
        $request->validate([
            'logo' => 'required|max:2048|mimes:png'
        ],[
            'logo.max' => 'Maximum 2MB!',
        ]);

        $logo = BasicSettings::first();
        if($logo->logo != null){
            unlink(public_path('uploads/settings/logo/'.$logo->logo));
        }

        $extension = $request->logo->extension();
        $file_name = uniqid().'.'.$extension;
        $manager = new ImageManager(new Driver());
        $image = $manager->read($request->logo);
        $image->resize(500, 250);
        $image->save(public_path('uploads/settings/logo/'.$file_name));

        BasicSettings::first()->update([
            'logo' => $file_name,
        ]);
        return back()->withSuccess('Logo updated successfully!');
    }

// Facebook
    public function facebook(Request $request){
        $request->validate([
            'facebook' => 'required|url'
        ]);

        BasicSettings::first()->update([
            'facebook' => $request->facebook,
        ]);
        return back()->withSuccess('Facebook link updated successfully!');
    }

    public function facebook_status(){
        $status = BasicSettings::first();
        if($status->facebook_status == 0){
            $status->update([
                'facebook_status' => 1,
            ]);
            return back()->withSuccess('Facebook link Deactivated!');
        }else{
            $status->update([
                'facebook_status' => 0,
            ]);
            return back()->withSuccess('Facebook link Active!');
        }
    }

// Twiter
    public function twiter(Request $request){
        $request->validate([
            'twiter' => 'required|url'
        ]);

        BasicSettings::first()->update([
            'twiter' => $request->twiter,
        ]);
        return back()->withSuccess('Twiter link updated successfully!');
    }

    public function twiter_status(){
        $status = BasicSettings::first();
        if($status->twiter_status == 0){
            $status->update([
                'twiter_status' => 1,
            ]);
            return back()->withSuccess('Twiter link Deactivated!');
        }else{
            $status->update([
                'twiter_status' => 0,
            ]);
            return back()->withSuccess('Twiter link Active!');
        }
    }

// Instagrm
    public function instagram(Request $request){
        $request->validate([
            'instagram' => 'required|url'
        ]);

        BasicSettings::first()->update([
            'instagram' => $request->instagram,
        ]);
        return back()->withSuccess('Instagram link updated successfully!');
    }

    public function instagram_status(){
        $status = BasicSettings::first();
        if($status->instagram_status == 0){
            $status->update([
                'instagram_status' => 1,
            ]);
            return back()->withSuccess('Instagram link Deactivated!');
        }else{
            $status->update([
                'instagram_status' => 0,
            ]);
            return back()->withSuccess('Instagram link Active!');
        }
    }

// Youtube
    public function youtube(Request $request){
        $request->validate([
            'youtube' => 'required|url'
        ]);

        BasicSettings::first()->update([
            'youtube' => $request->youtube,
        ]);
        return back()->withSuccess('Youtube link updated successfully!');
    }

    public function youtube_status(){
        $status = BasicSettings::first();
        if($status->youtube_status == 0){
            $status->update([
                'youtube_status' => 1,
            ]);
            return back()->withSuccess('Youtube link Deactivated!');
        }else{
            $status->update([
                'youtube_status' => 0,
            ]);
            return back()->withSuccess('Youtube link Active!');
        }
    }

    public function about(Request $request){
        $request->validate([
            'about_title' => 'required|max:50',
            'description' => 'required'
        ]);

        BasicSettings::first()->update([
            'about_title' => $request->about_title,
            'about_description' => $request->description,
        ]);
        return back()->withSuccess('About updated successfully!');
    }

    // Contact info
    public function contact(Request $request){
        return view('admin.basic_settings.contact_info');
    }

    public function address(Request $request){
        $request->validate([
            'address' => 'required'
        ]);

        BasicSettings::first()->update([
            'address' => $request->address,
        ]);
        return back()->withSuccess('Address updated successfully!');
    }

    public function email(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        BasicSettings::first()->update([
            'email' => $request->email,
        ]);
        return back()->withSuccess('Email updated successfully!');
    }

    public function phone(Request $request){
        $request->validate([
            'phone' => 'required|min_digits:11|max_digits:11'
        ]);

        BasicSettings::first()->update([
            'phone' => $request->phone,
        ]);
        return back()->withSuccess('Phone updated successfully!');
    }

}
