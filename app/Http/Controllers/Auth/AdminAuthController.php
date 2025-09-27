<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
        {
            if (session('admin_id')) {
                return redirect()->route('admin.dashboard');
            }
            return view('auth.admin-login');
        }

    public function login(Request $request)
    {
        $request->validate([
            'username'=>'required|string',
            'password'=>'required|string'
        ]);

        $admin = Admin::where('username', $request->username)->first();
        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error','Invalid credentials');
        }

    // store session
    session(['admin_id' => $admin->id, 'admin_name' => $admin->name]);
    return redirect()->route('admin.dashboard')->with('success', 'Login successful!');
    }

    public function logout()
    {
        session()->forget(['admin_id','admin_name']);
        return redirect()->route('admin.login');
    }
}
