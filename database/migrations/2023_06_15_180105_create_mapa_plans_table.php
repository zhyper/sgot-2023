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
        Schema::create('mapa_plan', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('componente_id');
            //
            $table->foreign('componente_id')
                ->references('id')->on('componente')
                ->onDelete('set null');
            //
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')
                ->references('id')->on('plan')
                ->onDelete('set null');
            //
            $table->unsignedBigInteger('etapa_plan_id');
            $table->foreign('etapa_plan_id')
                ->references('id')->on('etapa_plan')
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
        Schema::dropIfExists('mapa_plan');
    }
};
