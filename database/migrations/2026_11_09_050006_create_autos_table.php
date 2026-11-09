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
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modelo_id')->constrained('modelos');
            $table->unsignedSmallInteger('anio');
            $table->decimal('precio', 12, 2);
            $table->unsignedInteger('kilometraje')->nullable(); // solo seminuevos
            $table->string('color');
            $table->string('transmision');
            $table->string('combustible');
            $table->string('tipo');         // sedán, SUV, pickup...
            $table->string('condicion');    // nuevo / seminuevo
            $table->text('descripcion')->nullable();
            $table->string('estado')->default('disponible');
            $table->string('vin')->unique();
            $table->string('folio')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
