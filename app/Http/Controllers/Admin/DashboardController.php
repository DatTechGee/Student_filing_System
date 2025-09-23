<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Student;

class DashboardController extends Controller
{
    public function __construct()
    {
        // Use middleware for authentication
        $this->middleware(function ($request, $next) {
            if (!session('admin_id')) {
                return redirect()->route('admin.login');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $facultiesCount = Faculty::count();
        $departmentsCount = \App\Models\Department::count();
        $studentsCount = Student::count();
        $requirementsCount = \App\Models\DocumentRequirement::count();
        $uploadedFilesCount = \App\Models\StudentDocument::count();
        return view('admin.dashboard', compact('facultiesCount','departmentsCount','studentsCount','requirementsCount','uploadedFilesCount'));
    }
}
