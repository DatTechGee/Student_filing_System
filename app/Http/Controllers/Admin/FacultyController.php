<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
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
        $faculties = Faculty::orderBy('name')->get();
        return view('admin.faculties.index', compact('faculties'));
    }

    public function create()
    {
        return view('admin.faculties.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required|string|unique:faculties,name']);
        Faculty::create(['name'=>$request->name]);
        return redirect()->route('faculties.index')->with('success','Faculty created');
    }

    public function edit(Faculty $faculty)
    {
        return view('admin.faculties.edit', compact('faculty'));
    }

    public function update(Request $request, Faculty $faculty)
    {
        $request->validate(['name'=>"required|string|unique:faculties,name,{$faculty->id}"]);
        $faculty->update(['name'=>$request->name]);
        return redirect()->route('faculties.index')->with('success','Faculty updated');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('faculties.index')->with('success','Deleted');
    }
}
