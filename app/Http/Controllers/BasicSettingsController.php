<?php

namespace App\Http\Controllers;

use App\Models\BasicSettings;
use Illuminate\Http\Request;
use Intervention\Image\Colors\Rgb\Channels\Red;
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
            'title' => 'required|max:50'
        ]);

        BasicSettings::first()->update([
            'web_title' => $request->title,
        ]);
        return back()->withSuccess('Title updated successfully!');
    }
    public function tag_line(Request $request){
        $request->validate([
            'tag_line' => 'required|max:150'
        ]);

        BasicSettings::first()->update([
            'web_tag_line' => $request->tag_line,
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
        return back()->withSuccess('Facebook updated successfully!');
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
        return back()->withSuccess('Twiter updated successfully!');
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
        return back()->withSuccess('Instagram updated successfully!');
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
        return back()->withSuccess('Youtube updated successfully!');
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

}
