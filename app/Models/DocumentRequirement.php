<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'scope_type',
        'faculty_id',
        'department_id',
        'required_file_type',
        'scope',
    ];
}
