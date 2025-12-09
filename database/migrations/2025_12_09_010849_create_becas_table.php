<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('becas', function (Blueprint $table) {
            $table->id();

            // Campos básicos
            $table->string('nombre');
            $table->string('slug')->unique();

            // Imágenes
            $table->string('imagen_portada')->nullable();
            $table->string('banner')->nullable();

            // Textos del hero
            $table->string('titulo')->nullable();
            $table->string('subtitulo')->nullable();

            // Descripción principal
            $table->text('descripcion')->nullable();

            // Bloques dinámicos
            $table->json('beneficios')->nullable();
            $table->json('pasos')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('becas');
    }
};
