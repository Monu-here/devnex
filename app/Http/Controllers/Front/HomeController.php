<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return view('welcome');
    }
    public function contacts(Request $request)
    {
        try {
            if ($request->getMethod() == 'POST') {
                $contact = new ContactList();
                $contact->name = strip_tags($request->name);
                $contact->email1 = strip_tags($request->email1);
                $contact->subject = strip_tags($request->subject);
                $contact->message =strip_tags($request->message);
                $contact->save();
                return redirect()->back()->with('message', 'Your message has been sent successfully!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
