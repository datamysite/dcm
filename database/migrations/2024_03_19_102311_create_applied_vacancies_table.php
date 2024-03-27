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
        Schema::create('applied_vacancies', function (Blueprint $table) {
            $table->id();
            $table->integer('vacancie_id');
            $table->integer('user_id') ;
            $table->longText('resume_file')->nullable();
            $table->integer('status')->default('0');
            $table->integer('action_by')->default('0');
            $table->integer('del')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applied_vacancies');
    }
};
