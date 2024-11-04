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

            // Ensure social_media is an array and encode it as JSON
            $setting->social_media = json_encode($request->social_media);
            $setting->copyright = $request->copyright;
            if ($request->hasFile('website_image')) {
                $setting->website_image = $request->website_image->store('assets/uploads/setting');
            }
            $setting->save();
            return redirect()->back()->with('success', 'Setting updated successfully.');
        } else {
            $setting = Setting::first();
            $others = Setting::get();
            return view('admin.setting.add', compact('setting','others'));
        }
    }
}
