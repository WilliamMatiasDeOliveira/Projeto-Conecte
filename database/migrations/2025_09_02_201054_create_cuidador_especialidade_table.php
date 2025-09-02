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
        Schema::create('cuidador_especialidade', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cuidador_id')->constrained('cuidadores')->onDelete('cascade');
            $table->foreignId('especialidade_id')->constrained('especialidades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuidador_especialidade');
    }
};
