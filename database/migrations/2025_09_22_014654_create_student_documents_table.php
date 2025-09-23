<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('student_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->foreignId('requirement_id')->constrained('document_requirements')->onDelete('cascade');
            $table->string('file_path');
            $table->string('original_filename');
            $table->timestamp('uploaded_at')->nullable();
            $table->timestamps();
            $table->unique(['student_id','requirement_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_documents');
    }
}
