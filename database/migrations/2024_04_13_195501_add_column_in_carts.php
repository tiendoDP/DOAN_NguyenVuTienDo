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
        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedBigInteger('size_id')->nullable()->after('money');
            $table->foreign('size_id')->references('id')->on('sizes');

            $table->unsignedBigInteger('color_id')->nullable()->after('size_id');
            $table->foreign('color_id')->references('id')->on('colors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['size_id']);
            $table->dropColumn('size_id');

            $table->dropForeign(['color_id']);
            $table->dropColumn('color_id');
        });
    }
};
