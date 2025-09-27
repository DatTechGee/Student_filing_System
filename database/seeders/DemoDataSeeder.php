<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;
use App\Models\Department;
use App\Models\Student;
use App\Models\DocumentRequirement;
use Illuminate\Support\Facades\Storage;

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

        // Create 5 faculties
        $faculties = [];
        foreach ([
            'Natural and Applied Science',
            'Arts',
            'Entrepreneur',
            'Social Science',
            'Law'
        ] as $fname) {
            $faculties[] = Faculty::firstOrCreate(['name' => $fname]);
        }

        // Create 25 departments (5 per faculty)
        $departments = [];
        $deptNames = [
            'Physics','Chemistry','Biology','Mathematics','Computer Science',
            'History','Literature','Philosophy','Languages','Fine Arts',
            'Business Management','Entrepreneurship Studies','Accounting','Marketing','Finance',
            'Economics','Political Science','Sociology','Psychology','Geography',
            'Private Law','Public Law','International Law','Criminology','Legal Studies'
        ];
        $deptIdx = 0;
        foreach ($faculties as $fac) {
            for ($i=0; $i<5; $i++) {
                $departments[] = Department::firstOrCreate([
                    'name' => $deptNames[$deptIdx],
                    'faculty_id' => $fac->id
                ]);
                $deptIdx++;
            }
        }

        // Create 8 document requirements
        $requirements = [];
        foreach ([
            ['Passport Photo','global'],
            ['Birth Certificate','global'],
            ['JAMB Result','faculty'],
            ['WAEC Certificate','department'],
            ['Transcript','department'],
            ['Medical Report','global'],
            ['Departmental Clearance','department'],
            ['Project Proposal','department']
        ] as $idx => $req) {
            $scopeType = $req[1];
            $scopeId = null;
            if ($scopeType == 'faculty') $scopeId = $faculties[0]->id;
            if ($scopeType == 'department') $scopeId = $departments[$idx % count($departments)]->id;
            $requirements[] = DocumentRequirement::firstOrCreate([
                'name' => $req[0],
                'scope_type' => $scopeType,
                'scope_id' => $scopeId,
                'scope' => $scopeType == 'global' ? 'global' : ($scopeType == 'faculty' ? $faculties[0]->name : $departments[$idx % count($departments)]->name)
            ]);
        }

        
        for ($i = 1; $i <= 40; $i++) {
            $student = Student::create([
                'matric_no' => 'FT' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'first_name' => 'Student',
                'last_name' => $i,
                'faculty_id' => $faculties[$i % 5]->id,
                'department_id' => $departments[$i % 25]->id,
                'session' => '2025/2026',
                'password' => bcrypt('student'),
            ]);
            // No upload seeding
        }
    }
}
