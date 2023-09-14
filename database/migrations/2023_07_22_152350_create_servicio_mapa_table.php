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
        Schema::create('t_servicio_mapa', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->text('descripcion')->nullable();
            $table->string('wms')->nullable();
            $table->string('mvt')->nullable();
            $table->string('geojson')->nullable();
            $table->string('url_image')->nullable();
            $table->integer('estado')->nullable()->default(0);
            $table->integer('etapa_id');
            $table->integer('componente_id');
            $table->string('url_layer_geoserver');

            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')
                ->references('id')->on('plan')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_servicio_mapa');
    }
};
