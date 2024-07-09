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
        Schema::table('homestores', function (Blueprint $table) {
            $table->string('retailer_title_ar')->after('retailer_title')->default('none')->nullable();
            $table->longText('retailer_desc_ar')->after('retailer_desc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homestores', function (Blueprint $table) {
            $table->dropColumn('retailer_title_ar');
            $table->dropColumn('retailer_desc_ar');
        });
    }
};
