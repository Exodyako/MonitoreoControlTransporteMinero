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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id("us_id");
            $table->string("us_usuario",45)->unique();
            $table->string("us_contrasenia",400);
            $table->string("us_correo",100)->unique();
            $table->string("us_token",100);
            $table->foreignId("us_trabajador")->constrained(table:"trabajador",column:"co_id",indexName:"fk_usuario_trabajador");
            $table->foreignId("us_tipo")->constrained(table:"tipo_usuario",column:"tu_id",indexName:"fk_usuario_tipo");            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
