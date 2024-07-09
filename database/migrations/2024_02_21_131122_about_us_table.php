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
        //
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->integer('section_number')->default(0);
            $table->string('title');
            $table->longText('desc');
            $table->string('img')->default('none')->nullable();
            $table->integer('created_by');
            $table->integer('del')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('about_us');
    }
};
