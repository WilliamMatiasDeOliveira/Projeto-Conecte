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
            $table->string('nome', 80);
            $table->string('email', 255)->unique();
            $table->string('cpf', 15)->unique();
            $table->string('senha', 255);
            $table->string('telefone', 45)->nullable();
            $table->string('tipo_usuario', 45);
            $table->string('foto', 255)->nullable();
            $table->foreignId('endereco_id')
          ->constrained('enderecos')
          ->cascadeOnUpdate()
          ->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
