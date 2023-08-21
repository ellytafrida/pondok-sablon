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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('slide_1')->nullable();
            $table->string('slide_2')->nullable();
            $table->string('slide_3')->nullable();
            $table->string('slide_4')->nullable();
            $table->string('slide_5')->nullable();
            $table->string('image')->nullable();
            $table->string('name');
            $table->integer('minimum_order');
            $table->float('unit_price');
            $table->text('description');
            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('service_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
