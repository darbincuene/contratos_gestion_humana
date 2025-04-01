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
        Schema::create('historial_archivos', function (Blueprint $table) {
            $table->id();
            // $table->date('fecha_movimiento');
            $table->string('accion');
            $table->unsignedBigInteger('archivo_id')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('usuario_id')->nullable()->onDelete('cascade');
            $table->foreign('archivo_id')->references('id')->on('archivos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_archivos');
    }
};
