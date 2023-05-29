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
        Schema::create('ticket_bascula', function (Blueprint $table) {
            $table->id("tc_id");
            $table->timestamps();
            $table->string("tc_procedencia",100);
            $table->string("tc_destino",100);
            $table->string("tc_nombre_despachador",300);
            $table->integer("tc_peso_bruto");
            $table->integer("tc_peso_tara");
            $table->integer("tc_peso_neto");
            $table->string("tc_foto",300);
            $table->dateTime("tc_fech_fin");
            $table->foreignId("tc_vehiculo")->constrained(
                table: 'camion', indexName: 'fk_ticket_camion',column:"ca_id"
            );
            $table->foreignId("tc_conductor")->constrained(
                table: 'trabajador', indexName: 'fk_ticket_trabajador',column:"co_id"
            );           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_bascula');
    }
};
