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
        Schema::create('sedes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('ciudad')->nullable();
            $table->string('departamento')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo_contacto')->nullable();
            $table->string('horario')->nullable();        // texto libre: "Lun-Vie 9:00-18:00"
            $table->string('google_maps_url')->nullable(); // link para iframe o abrir mapa
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }

};
