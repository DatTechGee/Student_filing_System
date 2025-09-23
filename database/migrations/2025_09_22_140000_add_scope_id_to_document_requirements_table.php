<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('document_requirements', function (Blueprint $table) {
            $table->unsignedBigInteger('scope_id')->nullable()->after('scope_type');
        });
    }

    public function down()
    {
        Schema::table('document_requirements', function (Blueprint $table) {
            $table->dropColumn('scope_id');
        });
    }
};
