<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Faculty;

class DepartmentController extends Controller
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

    public function index()
    {
        $departments = Department::with('faculty')->get();
        return view('admin.departments.index', compact('departments'));
    }

    public function create()
    {
        $faculties = Faculty::orderBy('name')->get();
        return view('admin.departments.create', compact('faculties'));
    }

    public function store(Request $request)
    {
        $request->validate(['faculty_id'=>'required|exists:faculties,id','name'=>'required|string']);
        Department::create($request->only('faculty_id','name'));
        return redirect()->route('departments.index')->with('success','Department added');
    }

    public function edit(Department $department)
    {
        $faculties = Faculty::orderBy('name')->get();
        return view('admin.departments.edit', compact('department','faculties'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate(['faculty_id'=>'required|exists:faculties,id','name'=>'required|string']);
        $department->update($request->only('faculty_id','name'));
        return redirect()->route('departments.index')->with('success','Updated');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success','Deleted');
    }
}
