<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public function add(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            
            $homeSetting = new HomeSetting();
            $homeSetting->home_text = $request->home_text;
            $homeSetting->home_description = $request->home_description;
            $homeSetting->btn_text = $request->btn_text;
            $homeSetting->achievements_number = json_encode($request->achievements_number);
            $homeSetting->achievements_name = json_encode($request->achievements_name);
            $homeSetting->approch_name = json_encode($request->approch_name);
            $homeSetting->approch_desc = json_encode($request->approch_desc);
            $homeSetting->service_name = json_encode($request->service_name);
            $homeSetting->service_desc = json_encode($request->service_desc);
            if($request->hasFile('service_image')){
                $homeSetting->service_image = json_encode($request->service_image->store('assets/uploads/services'));
                
            }
            if($request->hasFile('approch_image')){
                 $homeSetting->approch_image = json_encode($request->approch_image->store('assets/uploads/approch'));
                
            }
            $homeSetting->save();
            return redirect()->back()->with('success', 'Home setting added successfully.');
        } else {
            $homeSettings = HomeSetting::all();
            return view('admin.setting.homeSetting' , compact('homeSettings'));
        }
    }
}
