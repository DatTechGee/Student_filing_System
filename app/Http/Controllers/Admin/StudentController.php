<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Faculty;
use App\Models\Department;

class StudentController extends Controller
{
    public function showBulkUpload()
    {
        return view('admin.students.bulk_upload');
    }
    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
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

    public function index()
    {
        $students = Student::with(['faculty','department'])->paginate(20);
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        $faculties = Faculty::all();
        $departments = Department::all();
        return view('admin.students.create', compact('faculties', 'departments'));
    }

    public function bulkUpload(Request $request)
    {
        $request->validate(['students_file'=>'required|file|mimes:csv,txt,xlsx,xls']);
        $file = $request->file('students_file');
        $ext = $file->getClientOriginalExtension();
        if (in_array($ext, ['csv', 'txt'])) {
            if (($handle = fopen($file->getRealPath(), 'r')) !== false) {
                $header = null;
                while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                    if (!$header) { $header = $row; continue; }
                    $data = array_combine($header, $row);
                    if (empty($data['matric_no'])) continue;
                    Student::updateOrCreate(
                        ['matric_no'=>$data['matric_no']],
                        [
                            'first_name'=>$data['first_name'] ?? '',
                            'last_name'=>$data['last_name'] ?? '',
                            'faculty_id'=>$data['faculty_id'] ?? 1,
                            'department_id'=>$data['department_id'] ?? 1,
                            'session'=>$data['session'] ?? null,
                            'password'=>bcrypt($data['password'] ?? 'password123')
                        ]
                    );
                }
                fclose($handle);
            }
        } else {
            // Excel file support
            try {
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getRealPath());
                $sheet = $spreadsheet->getActiveSheet();
                $rows = $sheet->toArray();
                $header = null;
                foreach ($rows as $row) {
                    if (!$header) { $header = $row; continue; }
                    $data = array_combine($header, $row);
                    if (empty($data['matric_no'])) continue;
                    Student::updateOrCreate(
                        ['matric_no'=>$data['matric_no']],
                        [
                            'first_name'=>$data['first_name'] ?? '',
                            'last_name'=>$data['last_name'] ?? '',
                            'faculty_id'=>$data['faculty_id'] ?? 1,
                            'department_id'=>$data['department_id'] ?? 1,
                            'session'=>$data['session'] ?? null,
                            'password'=>bcrypt($data['password'] ?? 'password123')
                        ]
                    );
                }
            } catch (\Exception $e) {
                return back()->with('error', 'Excel file could not be processed.');
            }
        }
        return redirect()->route('students.index')->with('success','Bulk upload complete');
    }
    public function edit(Student $student)
    {
        $faculties = Faculty::all();
        $departments = Department::where('faculty_id', $student->faculty_id)->get();
        return view('admin.students.edit', compact('student','faculties','departments'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'matric_no'=>"required|unique:students,matric_no,{$student->id}",
            'first_name'=>'required',
            'last_name'=>'required',
            'faculty_id'=>'required|exists:faculties,id',
            'department_id'=>'required|exists:departments,id',
            'session'=>'nullable',
        ]);
        $student->update($request->only('matric_no','first_name','last_name','faculty_id','department_id','session'));
        if ($request->filled('password')) $student->password = bcrypt($request->password);
        $student->save();
        return redirect()->route('students.index')->with('success','Student updated');
    }

    public function store(Request $request)
    {
        $request->validate([
            'matric_no' => 'required|unique:students,matric_no',
            'first_name' => 'required',
            'last_name' => 'required',
            'faculty_id' => 'required|exists:faculties,id',
            'department_id' => 'required|exists:departments,id',
            'session' => 'nullable',
            'password' => 'required|min:6',
        ]);

    $student = new Student();
    $student->matric_no = $request->matric_no;
    $student->first_name = $request->first_name;
    $student->last_name = $request->last_name;
    $student->faculty_id = $request->faculty_id;
    $student->department_id = $request->department_id;
    $student->session = $request->session;
    $student->password = bcrypt($request->password);
    $student->save();

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Deleted');
    }
}
