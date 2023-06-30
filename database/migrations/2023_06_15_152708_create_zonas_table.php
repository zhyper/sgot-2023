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
        Schema::create('zona', function (Blueprint $table) {
            $table->id();

            $table->string('codigo_zona',20);
            $table->string('nombre',200);
            $table->string('image',200)->nullable();
            $table->string('distrito')->nullable();
            $table->float('lat')->nullable();
            $table->float('lng')->nullable();
            $table->float('zoom')->nullable();
            $table->float('bearing')->nullable();
            $table->float('duration')->nullable();
            $table->float('pitch')->nullable();
            $table->unsignedBigInteger('distrito_id');
            //
            $table->foreign('distrito_id')
                ->references('id')->on('distrito')
                ->onDelete('set null');
            //
            $table->string('tipo_zre')->nullable();
            $table->text('observacion')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zona');
    }
};
