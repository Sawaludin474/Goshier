<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Index(){
        return view('backend.admin_login');
    }

    public function Dashboard(){
        return view('backend.index');
    }

    public function Login(Request $request){
        
        $check = $request->all();

if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
    return redirect()->route('admin.dashboard')->with('success', 'Admin login successful');
} else {
    return back()->with('error', 'Invalid email or password');
}
    }

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Logout admin sukses');
    }

    public function AdminRegister(){
        return view('backend.admin_register');
    }

    public function AdminRegisterCreate(Request $request){

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'create_at' => Carbon::now(),
        ]);

        return redirect()->route('login_form')->with('error','admin sukses dibuat');
    }
    

}
