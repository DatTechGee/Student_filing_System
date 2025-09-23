<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentRequirement;
use App\Models\Faculty;
use App\Models\Department;

class DocumentRequirementController extends Controller
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
        $requirements = DocumentRequirement::all();
        $faculties = Faculty::all();
        $departments = Department::all();
        return view('admin.document_requirements.index', compact('requirements','faculties','departments'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        $departments = Department::all();
        return view('admin.document_requirements.create', compact('faculties','departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'scope_type'=>'required|in:global,faculty,department',
            'scope_id'=>'nullable|integer'
        ]);
        DocumentRequirement::create($request->only('name','scope_type','scope_id'));
        return redirect()->route('document-requirements.index')->with('success','Added');
    }

    public function edit(DocumentRequirement $documentRequirement)
    {
        $faculties = Faculty::all();
        $departments = Department::all();
        return view('admin.document_requirements.edit', compact('documentRequirement','faculties','departments'));
    }

    public function update(Request $request, DocumentRequirement $documentRequirement)
    {
        $request->validate([
            'name'=>'required|string',
            'scope_type'=>'required|in:global,faculty,department',
            'scope_id'=>'nullable|integer'
        ]);
        $documentRequirement->update($request->only('name','scope_type','scope_id'));
        return redirect()->route('document-requirements.index')->with('success','Updated');
    }

    public function destroy(DocumentRequirement $documentRequirement)
    {
        $documentRequirement->delete();
        return redirect()->route('document-requirements.index')->with('success','Deleted');
    }
}
