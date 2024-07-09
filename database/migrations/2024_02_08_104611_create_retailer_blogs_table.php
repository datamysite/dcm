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
        Schema::create('retailer_blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('retailer_id');
            $table->integer('country_id');
            $table->string('heading');
            $table->longText('description');
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
        Schema::dropIfExists('retailer_blogs');
    }
};
