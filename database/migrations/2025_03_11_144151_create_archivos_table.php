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
        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_archivo');
            $table->string('tipo_archivo');
            $table->string('ruta_archivo');
            $table->unsignedBigInteger('subcarpeta_id')->nullable();
            $table->unsignedBigInteger('tipo_documento_id')->nullable();
            $table->foreign('subcarpeta_id')->references('id')->on('subcarpetas');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
