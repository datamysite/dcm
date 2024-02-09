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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('retailer_id');
            $table->string('banner')->nullable();
            $table->string('code');
            $table->string('heading');
            $table->string('link')->nullable();
            $table->integer('category_id');
            $table->double('discount');
            $table->double('dcm_cashback')->nullable();
            $table->longText('discount_tags')->nullable();
            $table->double('total_discount');
            $table->integer('people_used');
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('coupons');
    }
};
