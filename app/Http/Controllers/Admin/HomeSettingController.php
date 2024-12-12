<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public function add(Request $request)
    {
        try {
            if ($request->getMethod() == 'POST') {
                $validate = $request->validate([
                    'home_text' => 'required|string|max:255',
                    'home_description' => 'required|string|max:255',
                    'how_we_work_text_1' => 'required|string|max:255',
                    'how_we_work_text_2' => 'required|string|max:255',
                    'how_we_work_text_3' => 'required|string|max:255',
                    'how_we_work_text_4' => 'required|string|max:255',
                    'how_we_work_text_5' => 'required|string|max:255',
                    'how_we_work_icon_1' => 'image|mimes:png,jpg,gif,svg,webp',
                    'how_we_work_icon_2' => 'image|mimes:png,jpg,gif,svg,webp',
                    'how_we_work_icon_3' => 'image|mimes:png,jpg,gif,svg,webp',
                    'how_we_work_icon_4' => 'image|mimes:png,jpg,gif,svg,webp',
                    'how_we_work_icon_5' => 'image|mimes:png,jpg,gif,svg,webp',
                ]);

                $homeSetting = new HomeSetting();
                if ($request->hasFile('how_we_work_icon_1')) {
                    $homeSetting->how_we_work_icon_1 = $request->how_we_work_icon_1->store('assets/uploads/how_we_work');
                }
                if ($request->hasFile('how_we_work_icon_2')) {
                    $homeSetting->how_we_work_icon_2 = $request->how_we_work_icon_2->store('assets/uploads/how_we_work');
                }
                if ($request->hasFile('how_we_work_icon_3')) {
                    $homeSetting->how_we_work_icon_3 = $request->how_we_work_icon_3->store('assets/uploads/how_we_work');
                }
                if ($request->hasFile('how_we_work_icon_4')) {
                    $homeSetting->how_we_work_icon_4 = $request->how_we_work_icon_4->store('assets/uploads/how_we_work');
                }
                if ($request->hasFile('how_we_work_icon_5')) {
                    $homeSetting->how_we_work_icon_5 = $request->how_we_work_icon_5->store('assets/uploads/how_we_work');
                }
                $homeSetting->home_text = strip_tags($request->home_text);
                $homeSetting->home_description = strip_tags($request->home_description);
                $homeSetting->how_we_work_text_1 = strip_tags($request->how_we_work_text_1);
                $homeSetting->how_we_work_text_2 = strip_tags($request->how_we_work_text_2);
                $homeSetting->how_we_work_text_3 = strip_tags($request->how_we_work_text_3);
                $homeSetting->how_we_work_text_4 = strip_tags($request->how_we_work_text_4);
                $homeSetting->how_we_work_text_5 = strip_tags($request->how_we_work_text_5);
                $homeSetting->save();
                return redirect()->back()->with('message', 'Home setting added successfully');
            } else {
                $homeSetting = HomeSetting::first();
                return view('admin.setting.homeSetting', compact('homeSetting'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage(), 500);
        }
    }
}
