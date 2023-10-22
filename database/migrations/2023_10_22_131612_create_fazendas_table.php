<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fazendas', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->maxlenght(255);
            $table->string('cep')->nullable();
            $table->string('cidade')->nullable();
			$table->string('uf')->nullable();
			$table->string('logradouro')->nullable();
			$table->integer('numero')->nullable();
			$table->string('bairro')->nullable();
			$table->string('complemento')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fazendas');
    }
};
