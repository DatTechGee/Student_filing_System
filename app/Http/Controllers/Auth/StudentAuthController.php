<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.student-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'matric_no'=>'required|string',
            'password'=>'required|string'
        ]);

        $student = Student::where('matric_no', $request->matric_no)->first();
        if (!$student || !Hash::check($request->password, $student->password)) {
            return back()->with('error','Invalid credentials');
        }

        session(['student_id'=>$student->id, 'student_name'=>$student->first_name.' '.$student->last_name]);

        // If password is still default, require change
        if (Hash::check('student', $student->password)) {
            session(['must_change_password' => true]);
            return redirect()->route('student.change_password')->with('info', 'Please change your password before continuing.');
        } else {
            session()->forget('must_change_password');
        }

        return redirect()->route('student.dashboard');
    }

    public function logout()
    {
        session()->forget(['student_id','student_name']);
        return redirect()->route('student.login');
    }

    public function showChangePassword()
    {
        if (!session('student_id')) return redirect()->route('student.login');
        return view('auth.student-change-password');
    }

    public function changePassword(Request $request)
    {
        if (!session('student_id')) return redirect()->route('student.login');

        $request->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed|min:6'
        ]);

        $student = Student::find(session('student_id'));
        if (!Hash::check($request->current_password, $student->password)) {
            return back()->with('error','Current password invalid');
        }

    $student->password = bcrypt($request->password);
    $student->save();
    session()->forget('must_change_password');
    return redirect()->route('student.dashboard')->with('success','Password changed');
    }
}
