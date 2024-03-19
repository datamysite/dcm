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
        Schema::create('homestores', function (Blueprint $table) {

            $table->id();
            $table->integer('retailer_id');
            $table->integer('retailer_type')->default('0');
            $table->longText('retailer_title')->nullable();
            $table->longText('retailer_desc')->nullable();
            $table->integer('retailer_order')->default('0');
            $table->integer('status')->default('0');
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
        Schema::dropIfExists('homestores');
    }
};
