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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longtext('desc');
            $table->double('salary_from')->default('0.0');
            $table->double('salary_to')->default('0.0');
            $table->date('end_date');
            $table->integer('status')->default('0');
            $table->integer('created_by')->default('0');
            $table->integer('del')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
