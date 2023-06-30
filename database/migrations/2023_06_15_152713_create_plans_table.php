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
        Schema::create('plan', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->string('estado');
            $table->string('image')->nullable();
            $table->string('image2')->nullable();
            $table->string('codigo_plan');
            $table->unsignedBigInteger('estado_plan_id');
            //
            $table->foreign('estado_plan_id')
                ->references('id')->on('estado_plan')
                ->onDelete('set null');
            //
            $table->string('url_documento')->nullable();
            $table->string('url_reglamento')->nullable();
            $table->string('url_evar_cenepred')->nullable();
            $table->string('elaboracion_fecha_inicio')->nullable();
            $table->string('elaboracion_fecha_fin')->nullable();
            $table->string('consulta_fecha_inicio')->nullable();
            $table->string('consulta_fecha_fin')->nullable();
            $table->string('aprobacion_fecha')->nullable();
            $table->string('lev_observaciones')->nullable();
            $table->string('aprobacion_documento')->nullable();
            $table->string('prioridad')->nullable();
            $table->unsignedBigInteger('tipo_plan_id');
            //
            $table->foreign('tipo_plan_id')
                ->references('id')->on('tipo_plan')
                ->onDelete('set null');
            //
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')
                ->references('id')->on('provincia')
                ->onDelete('set null');
            $table->unsignedBigInteger('zona_id');
            //
            $table->foreign('zona_id')
                ->references('id')->on('zona')
                ->onDelete('set null');
            //
            $table->string('slug')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan');
    }
};
