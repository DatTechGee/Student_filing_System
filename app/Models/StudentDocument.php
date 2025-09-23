<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentDocument extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','requirement_id','file_path','original_filename','uploaded_at','resubmission_requested'];

    public function student() { return $this->belongsTo(Student::class); }
    public function requirement() { return $this->belongsTo(DocumentRequirement::class, 'requirement_id'); }
}
