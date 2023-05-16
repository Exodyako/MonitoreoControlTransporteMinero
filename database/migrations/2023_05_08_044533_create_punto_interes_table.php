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
        Schema::create('punto_interes', function (Blueprint $table) {
            $table->id("pi_id");
            $table->string("pi_nombre",100)->nullable(false);
            $table->string("pi_direccion",100)->nullable(false);
            $table->string("pi_icono",300)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('punto_interes');
    }
};
