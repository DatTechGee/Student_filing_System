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
        // Create 2 faculties
        $fac1 = Faculty::firstOrCreate(['name' => 'Science']);
        $fac2 = Faculty::firstOrCreate(['name' => 'Arts']);

        // Create 2 departments per faculty
        $dep1 = Department::firstOrCreate(['name' => 'Physics', 'faculty_id' => $fac1->id]);
        $dep2 = Department::firstOrCreate(['name' => 'Chemistry', 'faculty_id' => $fac1->id]);
        $dep3 = Department::firstOrCreate(['name' => 'History', 'faculty_id' => $fac2->id]);
        $dep4 = Department::firstOrCreate(['name' => 'Literature', 'faculty_id' => $fac2->id]);

        // Create 50 students
        for ($i = 1; $i <= 50; $i++) {
            Student::firstOrCreate([
                'matric_no' => 'STU' . str_pad($i, 3, '0', STR_PAD_LEFT)
            ], [
                'first_name' => 'Student',
                'last_name' => $i,
                'faculty_id' => $i <= 25 ? $fac1->id : $fac2->id,
                'department_id' => $i <= 13 ? $dep1->id : ($i <= 25 ? $dep2->id : ($i <= 38 ? $dep3->id : $dep4->id)),
                'session' => '2025/2026',
                'password' => bcrypt('student'),
            ]);
        }

        // Add document requirements
        DocumentRequirement::firstOrCreate([
            'name' => 'Passport Photo',
            'scope_type' => 'global',
            'scope_id' => null,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'Birth Certificate',
            'scope_type' => 'global',
            'scope_id' => null,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'JAMB Result',
            'scope_type' => 'faculty',
            'scope_id' => $fac1->id,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'WAEC Certificate',
            'scope_type' => 'department',
            'scope_id' => $dep2->id,
        ]);
        DocumentRequirement::firstOrCreate([
            'name' => 'Transcript',
            'scope_type' => 'department',
            'scope_id' => $dep3->id,
        ]);
    }
}
