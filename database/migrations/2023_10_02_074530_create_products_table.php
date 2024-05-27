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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('image');
            $table->unsignedBigInteger('category_id');
            $table->boolean('sex')->nullable()->comment('0: male 1: female');
            $table->integer('quantity')->default(0);
            $table->double('price');
            $table->integer('discount')->nullable();
            $table->boolean('status')->default(0)->comment('0: active 1: inactive');
            $table->integer('created_by');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
