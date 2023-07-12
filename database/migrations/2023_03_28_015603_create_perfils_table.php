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
        Schema::create('perfils', function (Blueprint $table) {
            $table->id();
            $table->string('imagen');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('correo', 80);
            $table->string('telefono', 15);
            $table->date('nacimiento');
            $table->string('pais', 50);
            $table->string('estado', 50);
            $table->string('ciudad', 50);
            $table->string('direccion', 300);
            $table->string('descripcion', 300);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfils');
    }
};
