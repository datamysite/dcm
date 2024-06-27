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
        Schema::create('genie_wish_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('coins');
            $table->double('amount');
            $table->string('curr');
            $table->integer('category_id');
            $table->string('link', 500)->nullable();
            $table->longText('description')->nullable();
            $table->longText('remarks')->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genie_wish_requests');
    }
};
