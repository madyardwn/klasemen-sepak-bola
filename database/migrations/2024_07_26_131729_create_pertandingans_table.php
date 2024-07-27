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
        Schema::create('pertandingans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('home_klub_id')->constrained('klubs')->onDelete('restrict');
            $table->foreignId('away_klub_id')->constrained('klubs')->onDelete('restrict');
            $table->integer('home_klub_score');
            $table->integer('away_klub_score');
            $table->unique(['home_klub_id', 'away_klub_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertandingans');
    }
};
