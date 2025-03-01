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
        {
            Schema::create('personajes', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->enum('tipo', ['atacante', 'defensor']);
                $table->string('unidad_especial');
                $table->integer('vida');
                $table->integer('velocidad');
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personajes');
    }

};
