<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'valor_emprestimo',
        'porcentagem_juros',
        'periodo_emprestimo',
        'valor_parcela_diaria',
        'valor_total',
        'status'
    ];

    protected $casts = [
        'valor_emprestimo' => 'decimal:2',
        'porcentagem_juros' => 'decimal:2',
        'valor_parcela_diaria' => 'decimal:2',
        'valor_total' => 'decimal:2',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function parcelas()
    {
        return $this->hasMany(Parcela::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($contrato) {
            // Criar parcelas automaticamente quando o contrato é criado
            for ($i = 1; $i <= $contrato->periodo_emprestimo; $i++) {
                $contrato->parcelas()->create([
                    'numero_parcela' => $i,
                    'valor' => $contrato->valor_parcela_diaria,
                    'data_vencimento' => $contrato->created_at->addDays($i),
                    'status' => 'pendente'
                ]);
            }
        });
    }
}
