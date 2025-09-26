<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Prevent dashboard access if password not changed
        if (session('must_change_password')) {
            return redirect()->route('student.change_password')->with('info', 'Please change your password before continuing.');
        }
        $student = \App\Models\Student::with(['faculty', 'department'])->find(session('student_id'));
        $requirementsCount = \App\Models\DocumentRequirement::where(function($q) use($student){
            $q->where('scope_type','global')
              ->orWhere(function($q2) use($student){
                  $q2->where('scope_type','faculty')->where('faculty_id',$student->faculty_id);
              })
              ->orWhere(function($q3) use($student){
                  $q3->where('scope_type','department')->where('department_id',$student->department_id);
              });
        })->count();
        $uploadedCount = \App\Models\StudentDocument::where('student_id', $student->id)->count();
        $pendingResubmissions = \App\Models\StudentDocument::where('student_id', $student->id)->where('resubmission_requested', true)->count();
        return view('student.dashboard', compact('student','requirementsCount','uploadedCount','pendingResubmissions'));
    }
}
