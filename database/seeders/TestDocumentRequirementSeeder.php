<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentRequirement;

class TestDocumentRequirementSeeder extends Seeder
{
    public function run()
    {
        DocumentRequirement::create([
            'name' => 'Test Requirement',
            'scope_type' => 'global',
            'scope_id' => null,
        ]);
    }
}
