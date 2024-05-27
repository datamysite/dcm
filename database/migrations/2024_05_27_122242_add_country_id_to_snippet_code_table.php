<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('snippet_code', function (Blueprint $table) {
            $table->integer('country_id')->after('snippet_code')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('snippet_code', function (Blueprint $table) {
            $table->dropColumn('country_id');
        });
    }
};
