<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class SettingController extends Controller
{
    public function index() {}
    // public function fetchData(){
    //     $colums = array([]);
    //     $data = array([]);
    //     // Fetch data from your database and populate $columns and $data arrays
    //     $settings = Setting::all();
    //     $totalSetting = $settings->count();
    //     $filterSetting = $totalSetting;
    //     if(isEmpty($settings)){
    //         // foreach($filterSetting as $
    //         // return response()->json(['draw' => 1,'recordsTotal' => $filterSetting,'recordsFiltered' => $filterSetting,'data' => $data]);
    //     }
    // }
    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $setting = new Setting();
            if ($setting == null) {
                $setting = Setting::first();
            }
            $setting->website_name = $request->website_name;
            $setting->website_title = $request->website_title;
            $setting->menu_name = $request->menu_name;
            $setting->social_media = $request->social_media;
            $setting->copyright = $request->copyright;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $setting->website_image = 'images/' . $imageName;
            }
            $setting->save();
            return redirect()->back()->with('success', 'Setting updated successfully.');
        } else {
            $setting = Setting::all();
            return view('admin.setting.add',compact('setting'));
        }
    }
}
