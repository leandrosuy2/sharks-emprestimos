<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    use HasFactory;

    protected $fillable = [
        'contrato_id',
        'numero_parcela',
        'valor',
        'data_vencimento',
        'data_pagamento',
        'status',
        'valor_pago',
        'forma_pagamento',
        'observacao'
    ];

    protected $casts = [
        'data_vencimento' => 'date',
        'data_pagamento' => 'date',
        'valor' => 'decimal:2',
        'valor_pago' => 'decimal:2'
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}
