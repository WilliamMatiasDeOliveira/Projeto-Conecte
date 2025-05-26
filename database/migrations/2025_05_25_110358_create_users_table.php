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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('tipo', 20)->nullable();
            $table->string('nome', 60)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('telefone', 11)->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('rua', 100)->nullable();
            $table->string('password', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('curriculo', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
