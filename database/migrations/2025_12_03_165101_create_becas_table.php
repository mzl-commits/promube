<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('becas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('tipo')->nullable();           // beca, programa, curso
            $table->string('nivel')->nullable();          // pregrado, posgrado, etc.
            $table->string('modalidad')->nullable();      // virtual, presencial
            $table->string('pais')->nullable();
            $table->string('area')->nullable();           // salud, ingeniería, etc.
            $table->text('resumen')->nullable();          // descripción breve
            $table->longText('descripcion')->nullable();  // info completa
            $table->text('beneficios')->nullable();       // para carrusel de beneficios
            $table->string('url_oficial')->nullable();    // link a la convocatoria oficial
            $table->boolean('es_destacada')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('becas');
    }
};
