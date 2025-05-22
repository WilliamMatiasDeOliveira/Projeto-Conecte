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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 60);
            $table->string('email', 100);
            $table->string('telefone', 11);
            $table->string('cpf', 11);
            $table->string('cidade', 200);
            $table->string('bairro', 100);
            $table->string('rua', 100);
            $table->string('password', 255);
            $table->string('foto')->null();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
