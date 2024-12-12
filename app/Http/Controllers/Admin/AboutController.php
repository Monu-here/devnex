<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                $abouts = About::orderBy('created_at', 'desc')->get();
                return view('admin.about.add', compact('abouts'));
            }
        } catch (\Exception $validate) {
            return redirect()->back()->with('error', $validate->getMessage());
        }
    }
    public function edit(Request $request,  $id)
    {
        try {
            $about = About::find($id);
            if ($request->getMethod() == 'POST') {

                $about->title = $request->title;
                $about->description = $request->description;
                if ($request->hasFile('image')) {
                    $about->image = $request->image->store('assets/uploads/about');
                }
                $about->update();
                return redirect()->route('admin.about.add')->with('message', 'About edit successfully.');
            } else {
                // $abouts = About::orderBy('created_at', 'desc')->first();
                return view('admin.about.edit', compact('about'));
            }
        } catch (\Exception $validate) {
            return redirect()->back()->with('error', $validate->getMessage());
        }
    }
    public function delete($id)
    {
        $about = About::where('id', $id)->first();
        if (!$about) {
            return redirect()->back()->with('error', 'About not found.');
        } else {
            $about->delete();
            return redirect()->route('admin.about.add')->with('message', 'About deleted successfully.');
        }
    }
}
