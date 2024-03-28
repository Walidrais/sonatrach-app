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
        Schema::create('autorisations', function (Blueprint $table) {
            $table->id();
            $table->time('heure_entree');
            $table->time('heure_sortie');
            $table->foreignId('agent')->constrained('users');
            $table->foreignId('citerne')->constrained('citernes');
            $table->foreignId('camion')->constrained('camions');
            $table->foreignId('chauffeur')->constrained('chauffeurs');
            $table->foreignId('convoyeur')->constrained('convoyeurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autorisations');
    }
};
