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
        Schema::create('favoritos', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $t->foreignId('auto_id')->constrained('autos')->onDelete('cascade');
            $t->timestamps();
            $t->unique(['user_id', 'auto_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};
