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
        Schema::create('historial_ruta', function (Blueprint $table) {
            $table->id("hr_id");
            $table->dateTime("hr_fecha");
            $table->foreignId("hr_camion")->constrained(
                table:"camion", column:"ca_id",indexName:"historial_camion_id"
            )->onDelete("cascade");
            $table->foreignId("hr_ruta")->constrained(
                table:"ruta",column:"ru_id",indexName:"historial_ruta_id"
            )->onDelete("cascade");
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_ruta');
    }
};
