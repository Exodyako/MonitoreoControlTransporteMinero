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
        Schema::create('coordenada', function (Blueprint $table) {
            $table->id("coo_id");
            $table->point("coo_coordenada");
            $table->boolean("coo_activo");
            $table->foreignId("coo_historial")->constrained(
                table:"historial_ruta",column:"hr_id",indexName:"coordenada_historial_id"
            )->onDelete("cascade");
            $table->foreignId("coo_ruta")->constrained(
                table:"ruta",column:"ru_id",indexName:"coordenada_ruta_id")->onDelete("cascade");
            $table->foreignId("coo_camion")->constrained(
                table:"camion",column:"ca_id",indexName:"coordenada_camion_id")->onDelete("cascade");
            $table->foreignId("coo_punto_interes")->constrained(
                table:"punto_interes",column:"pi_id",indexName:"coordenada_punto_id")->onDelete("cascade");
                $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordenada');
    }
};
