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
            // if ($request->validate([
            //     'home_text' => 'string' | 'required',
            //     'home_description' => 'string' | 'required',
            //     'btn_text' => 'string' | 'required',
            //     'achievements_number' => 'string' | 'required',
            //     'achievements_name' => 'string' | 'required',
            // ]));
            // else{
            //     echo 'please select a character from the character table and pass it to the character table class constructor function ';
            // }
            $homeSetting = new HomeSetting();
            $homeSetting->home_text = $request->home_text;
            $homeSetting->home_description = $request->home_description;
            $homeSetting->btn_text = $request->btn_text;
            $homeSetting->achievements_number = json_encode($request->achievements_number);
            $homeSetting->achievements_name = json_encode($request->achievements_name);
            $homeSetting->save();
            return redirect()->back()->with('success', 'Home setting added successfully.');
        } else {
            $homeSettings = HomeSetting::all();
            return view('admin.setting.homeSetting' , compact('homeSettings'));
        }
    }
}
