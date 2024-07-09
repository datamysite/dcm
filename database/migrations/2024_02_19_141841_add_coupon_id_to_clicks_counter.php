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
        Schema::table('clicks_counter', function (Blueprint $table) {
            $table->integer('coupon_id')->after('retailer_id')->nullable();
            $table->integer('offer_id')->after('coupon_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clicks_counter', function (Blueprint $table) {
            $table->dropColumn('coupon_id');
            $table->dropColumn('offer_id');
        });
    }
};
