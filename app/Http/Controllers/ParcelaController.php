<?php

namespace App\Http\Controllers;

use App\Models\Parcela;
use App\Models\Contrato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParcelaController extends Controller
{
    public function pagar(Request $request, Parcela $parcela)
    {
        $request->validate([
            'valor_pago' => 'required|numeric|min:0',
            'data_pagamento' => 'required|date',
            'forma_pagamento' => 'required|in:dinheiro,pix,cartao,transferencia',
            'observacao' => 'nullable|string'
        ]);

        DB::transaction(function () use ($parcela, $request) {
            $parcela->update([
                'status' => 'pago',
                'valor_pago' => $request->valor_pago,
                'data_pagamento' => $request->data_pagamento,
                'forma_pagamento' => $request->forma_pagamento,
                'observacao' => $request->observacao
            ]);

            // Verificar se todas as parcelas foram pagas
            $contrato = $parcela->contrato;
            $todasPagas = $contrato->parcelas()->where('status', '!=', 'pago')->count() === 0;

            if ($todasPagas) {
                $contrato->update(['status' => 'finalizado']);
            }
        });

        return redirect()->back()->with('success', 'Pagamento registrado com sucesso!');
    }

    public function pagarTodas(Request $request, Contrato $contrato)
    {
        $request->validate([
            'valor_pago' => 'required|numeric|min:0',
            'data_pagamento' => 'required|date',
            'forma_pagamento' => 'required|in:dinheiro,pix,cartao,transferencia',
            'observacao' => 'nullable|string'
        ]);

        DB::transaction(function () use ($contrato, $request) {
            $contrato->parcelas()->where('status', '!=', 'pago')->update([
                'status' => 'pago',
                'valor_pago' => $request->valor_pago,
                'data_pagamento' => $request->data_pagamento,
                'forma_pagamento' => $request->forma_pagamento,
                'observacao' => $request->observacao
            ]);

            $contrato->update(['status' => 'finalizado']);
        });

        return redirect()->back()->with('success', 'Todas as parcelas foram pagas com sucesso!');
    }
}
