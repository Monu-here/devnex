<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                $contact = Contact::first();
                $contactLists = DB::table('contact_lists')->get();
                return view('admin.contact.add', compact('contact','contactLists'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function delete($id){
        try {
            $contact = ContactList::find($id);
            if ($contact) {
                $contact->delete();
                return redirect()->back()->with('message', 'Contact list deleted successfully.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
