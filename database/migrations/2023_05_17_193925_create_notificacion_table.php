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
        Schema::create('notificacion', function (Blueprint $table) {
            $table->id("no_id");
            $table->string("no_titulo",45);
            $table->string("no_mensaje",100);
            $table->string("no_tipo_solicitud",45);
            $table->string("no_nivel_riesgo",45);
            $table->foreignId("no_usuario")->constrained(table:"usuario",column:"us_id",indexName:"fk_notificacion_usuario");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notificacion');
    }
};
