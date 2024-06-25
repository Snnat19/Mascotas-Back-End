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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('documento');
            $table->string('email');
            $table->string('telefono');
            $table->string('nom_mascota');
            $table->string('especie');
            $table->string('raza');
            $table->string('color');
            $table->string('ubicacion');
            $table->date('fecha');
            $table->timestamps();
        });
    }

  
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
