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
        Schema::create('home_slide_items', function (Blueprint $table) {
            $table->id();
            //
            $table->string('name',50)->nullable();
            $table->string('title')->nullable();
            $table->string('short_title')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            //
            $table->unsignedBigInteger('home_slide_id');
            $table->foreign('home_slide_id')
                ->references('id')->on('home_slides')
                ->onDelete('set null');
            //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_slide_items');
    }
};
