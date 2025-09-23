<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('student_documents', function (Blueprint $table) {
            $table->boolean('resubmission_requested')->default(false);
        });
    }

    public function down()
    {
        Schema::table('student_documents', function (Blueprint $table) {
            $table->dropColumn('resubmission_requested');
        });
    }
};
