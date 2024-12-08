<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function add(Request $request)
    {
        try {
            if ($request->getMethod() == 'POST') {
                $validate = $request->validate([
                    'title' => 'required|string|max:255',
                    'description' => 'required|string',
                    'image' => 'required|image|mimes:png,jpg,gif,svg,webp',

                ]);
                $about = new About();
                $about->title = $request->title;
                $about->description = $request->description;
                if ($request->hasFile('image')) {
                    $about->image = $request->image->store('assets/uploads/about');
                }
                $about->save();
                return redirect()->back()->with('message', 'About added successfully.');
            } else {
                $about = About::orderBy('created_at', 'desc')->first();
                return view('admin.about.add', compact('about'));
            }
        } catch (\Exception $validate) {
            return redirect()->back()->with('error', $validate->getMessage());
        }
    }
}
