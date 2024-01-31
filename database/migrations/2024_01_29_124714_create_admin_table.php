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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('fullname')->nullable();
            $table->string('username')->unique();
            $table->string('image')->nullable();
            $table->string('designation')->nullable();
            $table->tinyInteger('type')->length(1);
            $table->string('password');
            $table->integer('created_by')->default('0');
            $table->tinyInteger('is_active')->length(1)->default('1');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
