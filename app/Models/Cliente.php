<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'whatsapp',
        'cpf',
        'email',
        'cep',
        'rua',
        'complemento',
        'numero',
        'bairro',
        'cidade',
        'estado'
    ];
}
