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
        Schema::create('beneficiados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_completo');
            $table->string('programa')->nullable();     // nombre de la beca/programa
            $table->string('foto_url')->nullable();     // ruta a imagen
            $table->text('biografia')->nullable();      // breve historia/testimonio
            $table->string('region')->nullable();       // Choco, Palca, Cairani, etc.
            $table->string('anio')->nullable();         // ej. "2024"
            $table->boolean('visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beneficiados');
    }

};
