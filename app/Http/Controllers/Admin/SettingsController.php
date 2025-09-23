<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session('admin_id')) {
                return redirect()->route('admin.login');
            }
            return $next($request);
        });
    }

    public function show()
    {
        $admin = Admin::find(session('admin_id'));
        return view('admin.settings', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = Admin::find(session('admin_id'));
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
        $admin->name = $request->name;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        return back()->with('success', 'Settings updated successfully.');
    }
}
