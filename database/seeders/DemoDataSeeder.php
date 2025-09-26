<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Student;
use App\Models\DocumentRequirement;

class DemoDataSeeder extends Seeder
{
    public function run()
    {
        // Seed default admin
        \App\Models\Admin::firstOrCreate([
            'username' => 'admin'
        ], [
            'name' => 'Administrator',
            'password' => bcrypt('admin'),
        ]);
    // Create faculties
    $fac1 = Faculty::firstOrCreate(['name' => 'Natural and Applied Science']);
    $fac2 = Faculty::firstOrCreate(['name' => 'Arts']);
    $fac3 = Faculty::firstOrCreate(['name' => 'Entrepreneur']);
    $fac4 = Faculty::firstOrCreate(['name' => 'Social Science']);
    $fac5 = Faculty::firstOrCreate(['name' => 'Law']);

    // Create 2 departments per faculty
    $dep1 = Department::firstOrCreate(['name' => 'Physics', 'faculty_id' => $fac1->id]);
    $dep2 = Department::firstOrCreate(['name' => 'Chemistry', 'faculty_id' => $fac1->id]);
    $dep3 = Department::firstOrCreate(['name' => 'History', 'faculty_id' => $fac2->id]);
    $dep4 = Department::firstOrCreate(['name' => 'Literature', 'faculty_id' => $fac2->id]);
    $dep5 = Department::firstOrCreate(['name' => 'Computer Science', 'faculty_id' => $fac1->id]);
    $dep6 = Department::firstOrCreate(['name' => 'Business Management', 'faculty_id' => $fac3->id]);
    $dep7 = Department::firstOrCreate(['name' => 'Entrepreneurship Studies', 'faculty_id' => $fac3->id]);
    $dep8 = Department::firstOrCreate(['name' => 'Economics', 'faculty_id' => $fac4->id]);
    $dep9 = Department::firstOrCreate(['name' => 'Political Science', 'faculty_id' => $fac4->id]);
    $dep10 = Department::firstOrCreate(['name' => 'Private Law', 'faculty_id' => $fac5->id]);
    $dep11 = Department::firstOrCreate(['name' => 'Public Law', 'faculty_id' => $fac5->id]);
        // Add department-specific requirements for new faculties
        DocumentRequirement::firstOrCreate([
            'name' => 'Business Plan',
            'scope_type' => 'department',
            'scope_id' => $dep6->id,
            'scope' => $dep6->name,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'Entrepreneurship Project',
            'scope_type' => 'department',
            'scope_id' => $dep7->id,
            'scope' => $dep7->name,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'Research Paper',
            'scope_type' => 'department',
            'scope_id' => $dep8->id,
            'scope' => $dep8->name,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'Field Work Report',
            'scope_type' => 'department',
            'scope_id' => $dep9->id,
            'scope' => $dep9->name,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'Case Law Analysis',
            'scope_type' => 'department',
            'scope_id' => $dep10->id,
            'scope' => $dep10->name,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'Legal Drafting',
            'scope_type' => 'department',
            'scope_id' => $dep11->id,
            'scope' => $dep11->name,
        ]);

        // Create 50 students (original DemoDataSeeder logic)
        $last = Student::orderBy('id','desc')->first();
        $start = $last ? intval(substr($last->matric_no,3)) + 1 : 21;
        for ($i = $start; $i < $start+50; $i++) {
            Student::create([
                'matric_no' => 'FT' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'first_name' => 'Student',
                'last_name' => $i,
                'faculty_id' => 1,
                'department_id' => 1,
                'session' => '2025/2026',
                'password' => bcrypt('student'),
            ]);
        }

        // Add document requirements (original DemoDataSeeder logic)
        DocumentRequirement::firstOrCreate([
            'name' => 'Passport Photo',
            'scope_type' => 'global',
            'scope_id' => null,
            'scope' => 'global',
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'Birth Certificate',
            'scope_type' => 'global',
            'scope_id' => null,
            'scope' => 'global',
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'JAMB Result',
            'scope_type' => 'faculty',
            'scope_id' => $fac1->id,
            'scope' => $fac1->name,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'WAEC Certificate',
            'scope_type' => 'department',
            'scope_id' => $dep2->id,
            'scope' => $dep2->name,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'Transcript',
            'scope_type' => 'department',
            'scope_id' => $dep3->id,
            'scope' => $dep3->name,
        ]);

        // Add 30 more students (from MoreDemoSeeder)
        $last = Student::orderBy('id','desc')->first();
        $start = $last ? intval(substr($last->matric_no,3)) + 1 : 21;
        for ($i = $start; $i < $start+30; $i++) {
            Student::create([
                'matric_no' => 'STU' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'first_name' => 'Student',
                'last_name' => $i,
                'faculty_id' => 1,
                'department_id' => 1,
                'session' => '2025/2026',
                'password' => bcrypt('student'),
            ]);
        }

        // Add 5 global requirements (from MoreDemoSeeder)
        foreach ([
            'Birth Certificate',
            'WAEC Result',
            'JAMB Admission Letter',
            'Medical Report',
            'Passport Photograph'
        ] as $name) {
            DocumentRequirement::create([
                'name' => $name,
                'scope_type' => 'global',
                'scope_id' => null,
                'scope' => 'global',
            ]);
        }

        // Add 3 department-specific requirements (from MoreDemoSeeder)
        $departmentName = Department::find(1) ? Department::find(1)->name : 'Department';
        foreach ([
            'Departmental Clearance',
            'Lab Safety Form',
            'Project Proposal'
        ] as $name) {
            DocumentRequirement::create([
                'name' => $name,
                'scope_type' => 'department',
                'scope_id' => 1,
                'scope' => $departmentName,
            ]);
        }

        // Seed 40 uploaded files: 10 students x 4 requirements
        $students = \App\Models\Student::take(10)->get();
        $requirements = \App\Models\DocumentRequirement::take(4)->get();
        foreach ($students as $s) {
            foreach ($requirements as $r) {
                \App\Models\StudentDocument::firstOrCreate([
                    'student_id' => $s->id,
                    'requirement_id' => $r->id
                ], [
                    'file_path' => 'student_documents/demo.pdf',
                    'original_filename' => 'demo.pdf',
                    'uploaded_at' => now(),
                    'resubmission_requested' => false
                ]);
            }
        }
    }
    
}
