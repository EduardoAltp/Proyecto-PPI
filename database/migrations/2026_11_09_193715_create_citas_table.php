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
        Schema::create('citas', function (Blueprint $t) {
            $t->id();
            $t->string('folio')->unique();
            $t->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $t->foreignId('auto_id')->constrained('autos');
            $t->dateTime('fecha');
            $t->string('nombre_contacto');
            $t->string('telefono_contacto');
            $t->string('email_contacto');
            $t->text('comentarios')->nullable();
            $t->string('estatus')->default('pendiente');
            $t->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
