<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function add(Request $request)
    {
        try {

            if ($request->getMethod() == 'POST') {
                // validate the data
                $request->validate([
                    'name' => 'required|string|max:255',
                    'description' => 'required|string',
                    'icon' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
                ]);


                $service = new Service();
                $service->name = $request->input('name');
                $service->description = $request->input('description');
                $service->icon = $request->icon->store('assets/uploads/services');
                $service->save();
                return redirect()->back()->with('message', 'Service added successfully.');
            } else {
                $services = Service::orderBy('created_at', 'Desc')->get();
                return view('admin.service.add', compact('services'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit(Request $request, $id)
    {
        try {
            $service = Service::find($id);
            if ($service) {
                if ($request->getMethod() == 'POST') {
                    // validate the data
                    $service->name = $request->input('name');
                    $service->description = $request->input('description');
                    if ($request->hasFile('icon')) {
                        $service->icon = $request->icon->store('assets/uploads/services');
                    }
                    $service->save();
                    return redirect()->route('admin.service.add')->with('message', 'Service edit successfully.');
                } else {
                    return view('admin.service.edit', compact('service'));
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function delete($id){
        try {
            $service = Service::find($id);
            if ($service) {
                $service->delete();
                return redirect()->route('admin.service.add')->with('message', 'Service deleted successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
