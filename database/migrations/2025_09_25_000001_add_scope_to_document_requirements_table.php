<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('document_requirements', function (Blueprint $table) {
            $table->string('scope')->nullable()->after('scope_id');
        });
    }

    public function down()
    {
        Schema::table('document_requirements', function (Blueprint $table) {
            $table->dropColumn('scope');
        });
    }
};
