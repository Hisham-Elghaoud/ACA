<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::firstOrCreate();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        \App\Models\Setting::query()->update([
            'website_name'=>$request->website_name,
            'address'=>$request->address,
            'vision'=>$request->vision,
            'remain_vision'=>$request->remain_vision,
            'message'=>$request->message,
            'remain_message'=>$request->remain_message,
            'values'=>$request->values,
            'remain_values'=>$request->remain_values,
            'contact_email'=>$request->contact_email,
            'phone'=>$request->phone,
            'facebook_link'=>$request->facebook_link,
            'twitter_link'=>$request->twitter_link,
            'instagram_link'=>$request->instagram_link,
            'youtube_link'=>$request->youtube_link,
            'linkedin_link'=>$request->linkedin_link,
            'google_map_link'=>$request->google_map_link,
            'privacy_page'=>$request->privacy_page,
            'terms_page'=>$request->terms_page,
            'about_page'=>$request->about_page,
            'contact_page'=>$request->contact_page,
        ]);
        
        if ($request->hasFile('website_logo')) {
            $file = $this->store_file([
                'source'=>$request->website_logo,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                'resize'=>null,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER', 'local'),
                'compress'=>'auto'
            ])['filename'];
            \App\Models\Setting::query()->update(['website_logo'=>$file]);
        }
        if ($request->hasFile('website_wide_logo')) {
            $file = $this->store_file([
                'source'=>$request->website_wide_logo,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                'resize'=>null,
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER', 'local'),
                'compress'=>'auto'
            ])['filename'];
            \App\Models\Setting::query()->update(['website_wide_logo'=>$file]);
        }
        if ($request->hasFile('website_icon')) {
            $file = $this->store_file([
                'source'=>$request->website_icon,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER', 'local'),
                'compress'=>'auto'
            ])['filename'];
            \App\Models\Setting::query()->update(['website_icon'=>$file]);
        }
        

        if ($request->hasFile('website_cover')) {
            $file = $this->store_file([
                'source'=>$request->website_cover,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER', 'local'),
                'compress'=>'auto'
            ])['filename'];
            \App\Models\Setting::query()->update(['website_cover'=>$file]);
        }

        notify()->success('تم تحديث الإعدادات بنجاح', 'عملية ناجحة');
        return redirect()->back();
    }
}