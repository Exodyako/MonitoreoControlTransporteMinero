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
        Schema::create('conductor', function (Blueprint $table) {
            $table->id("co_id");
            $table->string("co_foto", 300)->nullable(true);
            $table->string("co_telefono", 45)->nullable(false);
            $table->string("co_nombre",300)->nullable(false);
            $table->string("co_identificacion",45)->nullable(false)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conductor');
    }
};
