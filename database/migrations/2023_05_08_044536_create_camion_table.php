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
        Schema::create('camion', function (Blueprint $table) {
            $table->id("ca_id");
            $table->string("ca_foto",300)->nullable(false);
            $table->string("ca_color",45)->nullable(false);
            $table->boolean("ca_activo")->nullable(false);
            $table->string("ca_matricula",45)->nullable(false);
            $table->string("ca_modelo",45)->nullable(false);           
            $table->foreignId('ca_conductor')->constrained(
                table: 'conductor', indexName: 'camion_conductor_id',column:"co_id"
            )->onDelete("cascade");
            $table->foreignId("ca_tipo")->constrained(
                table:"tipo_camion",indexName:"camion_tipo_id",column:"tc_id"
            )->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('camion');
    }
};
