<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentRequirement;
use App\Models\Student;

class MoreDemoSeeder extends Seeder
{
    public function run()
    {
        // Add 30 more students
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
                'password' => bcrypt('paaswor'),
            ]);
        }
        // Add 5 global requirements
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
            ]);
        }
        // Add 3 department-specific requirements
        foreach ([
            'Departmental Clearance',
            'Lab Safety Form',
            'Project Proposal'
        ] as $name) {
            DocumentRequirement::create([
                'name' => $name,
                'scope_type' => 'department',
                'scope_id' => 1,
            ]);
        }
    }
}
