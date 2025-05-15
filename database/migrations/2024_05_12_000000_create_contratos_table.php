<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->decimal('valor_emprestimo', 10, 2);
            $table->decimal('porcentagem_juros', 10, 2);
            $table->integer('periodo_emprestimo');
            $table->decimal('valor_parcela_diaria', 10, 2);
            $table->decimal('valor_total', 10, 2);
            $table->enum('status', ['ativo', 'finalizado', 'cancelado'])->default('ativo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contratos');
    }
};
