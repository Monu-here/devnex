<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $credential = $request->only('email', 'password');
            $credential['role'] = '1';
            if (Auth::attempt($credential)) {
                return redirect()->route('admin.dashboard');
            } else {
                return view('admin.login.index');
                // return redirect()->back()->withInput()->withErrors(['email' => 'Invalid credentials']);
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
    // public function user(){
    //     $data = User::get(['name','email']);
    //     return response()->json(array('data' => $data));
    // }
}
