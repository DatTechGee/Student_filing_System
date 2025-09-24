<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\StudentDocument;

class UploadViewController extends Controller
{
    public function cancelResubmission($docId)
    {
        $doc = StudentDocument::findOrFail($docId);
        $doc->resubmission_requested = false;
        $doc->save();
        return back()->with('success', 'Resubmission request cancelled.');
    }
    public function details(StudentDocument $doc)
    {
        $doc->load('student','requirement');
        return view('admin.uploads.details', compact('doc'));
    }
    public function requestResubmission($docId)
    {
        $doc = StudentDocument::findOrFail($docId);
        $doc->resubmission_requested = true;
        $doc->save();
        return back()->with('success', 'Resubmission requested for this document.');
    }
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session('admin_id')) {
                return redirect()->route('admin.login');
            }
            return $next($request);
        });
    }

    public function index(Request $request)
    {
    $faculties = Faculty::orderByDesc('created_at')->get();
    $departments = Department::orderByDesc('created_at')->get();

    // Order by updated_at so the most recently updated (uploaded) student comes first
    $query = Student::with('documents','faculty','department')->orderByDesc('updated_at');

    if ($request->filled('faculty_id')) $query->where('faculty_id', $request->faculty_id);
    if ($request->filled('department_id')) $query->where('department_id', $request->department_id);
    if ($request->filled('session')) $query->where('session', $request->session);

    $students = $query->paginate(20);
    return view('admin.uploads.index', compact('students','faculties','departments'));
    }

    public function show(Student $student)
    {
    $documents = $student->documents()->with('requirement')->orderByDesc('uploaded_at')->get();
        return view('admin.uploads.show', compact('student','documents'));
    }
}
