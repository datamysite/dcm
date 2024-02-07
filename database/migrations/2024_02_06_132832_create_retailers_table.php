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
        Schema::create('retailers', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->string('store_link')->nullable();
            $table->double('discount_upto');
            $table->string('discount_tags')->nullable();
            $table->tinyInteger('status')->default('1');
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retailers');
    }
};
