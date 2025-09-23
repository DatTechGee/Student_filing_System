<?php

namespace App\Http\Controllers\Student;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentRequirement;
use App\Models\StudentDocument;
use App\Models\Student;


class StudentDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session('student_id')) {
                return redirect()->route('student.login');
            }
            return $next($request);
        });
    }

    // list requirements and uploaded status
    public function index()
    {
        $student = Student::with('faculty','department')->find(session('student_id'));

        // gather applicable requirements: global + faculty + department
        $requirements = DocumentRequirement::where(function($q) use($student){
            $q->where('scope_type','global')
              ->orWhere(function($q2) use($student){
                  $q2->where('scope_type','faculty')->where('faculty_id',$student->faculty_id);
              })
              ->orWhere(function($q3) use($student){
                  $q3->where('scope_type','department')->where('department_id',$student->department_id);
              });
        })->orderByDesc('created_at')->get();

        // map existing uploaded docs, latest first
        $uploaded = StudentDocument::where('student_id', $student->id)
            ->orderByDesc('uploaded_at')
            ->get()
            ->keyBy('requirement_id');

        return view('student.uploads.index', compact('requirements','uploaded','student'));
    }

    public function create($requirementId)
    {
        $requirement = DocumentRequirement::findOrFail($requirementId);
        return view('student.uploads.create', compact('requirement'));
    }

    public function store(Request $request, $requirementId)
    {
        $requirement = DocumentRequirement::findOrFail($requirementId);
        $request->validate([
            'file'=>'required|file|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx,mp3,mp4|max:10240'
        ]);
        $studentId = session('student_id');

        $file = $request->file('file');
        $original = $file->getClientOriginalName();
        $path = $file->store('student_documents','public');

        // if exists, delete previous file
        $existing = StudentDocument::where('student_id',$studentId)->where('requirement_id',$requirement->id)->first();
        if ($existing) {
            if (Storage::disk('public')->exists($existing->file_path)) {
                Storage::disk('public')->delete($existing->file_path);
            }
            $existing->update([
                'file_path'=>$path,
                'original_filename'=>$original,
                'uploaded_at'=>now(),
                'resubmission_requested'=>false
            ]);
        } else {
            StudentDocument::create([
                'student_id'=>$studentId,
                'requirement_id'=>$requirement->id,
                'file_path'=>$path,
                'original_filename'=>$original,
                'uploaded_at'=>now(),
                'resubmission_requested'=>false
            ]);
        }

        return redirect()->route('student.uploads.index')->with('success','Uploaded');
    }

    public function edit($id)
    {
        $doc = StudentDocument::findOrFail($id);
        if ($doc->student_id != session('student_id')) abort(403);
        return view('student.uploads.edit', compact('doc'));
    }

    public function update(Request $request, $id)
    {
        $doc = StudentDocument::findOrFail($id);
        if ($doc->student_id != session('student_id')) abort(403);
        $request->validate(['file'=>'required|file|mimes:pdf,jpg,jpeg,png|max:10240']);
        $file = $request->file('file');
        $path = $file->store('student_documents','public');
        if (Storage::disk('public')->exists($doc->file_path)) {
            Storage::disk('public')->delete($doc->file_path);
        }
        $doc->update([
            'file_path' => $path,
            'original_filename' => $file->getClientOriginalName(),
            'uploaded_at' => now(),
            'resubmission_requested' => false // clear resubmission flag
        ]);
        return redirect()->route('student.uploads.index')->with('success','Document updated successfully!');
    }

    public function download($id)
    {
        $doc = StudentDocument::findOrFail($id);

        // only admin or owner (we allow admin route to view via admin controller). Here check student owner:
        if ($doc->student_id != session('student_id')) {
            abort(403);
        }
    return response()->download(public_path('storage/' . $doc->file_path), $doc->original_filename);
    }
}
