<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function add(Request $request)
    {
        try {
            if ($request->getMethod() == 'POST') {
                $validate = $request->validate([
                    'address' => 'required|string|max:255',
                    'map' => 'required|',
                    'call' => 'required|string|max:20',
                    'email' => 'required|string|max:255',
                ]);
                $contact = new Contact();
                $contact->address = $request->address;
                $contact->map = $request->map;
                $contact->call = $request->call;
                $contact->email = $request->email;
                $contact->save();
                return redirect()->back()->with('message', 'Contact added successfully');
            } else {
                return view('admin.contact.add');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
         }
    }
}
