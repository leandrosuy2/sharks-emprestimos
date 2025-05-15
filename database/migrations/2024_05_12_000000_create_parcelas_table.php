<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contrato_id')->constrained()->onDelete('cascade');
            $table->integer('numero_parcela');
            $table->decimal('valor', 10, 2);
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->enum('status', ['pendente', 'pago', 'atrasado'])->default('pendente');
            $table->decimal('valor_pago', 10, 2)->nullable();
            $table->enum('forma_pagamento', ['dinheiro', 'pix', 'cartao', 'transferencia'])->nullable();
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcelas');
    }
};
