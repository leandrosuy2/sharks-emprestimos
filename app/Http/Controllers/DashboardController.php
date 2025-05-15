<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Cliente;
use App\Models\Parcela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total de contratos
        $totalContratos = Contrato::count();

        // Valor total que falta pagar (soma das parcelas pendentes)
        $faltaPagar = Parcela::where('status', 'pendente')
            ->orWhere('status', 'atrasado')
            ->sum('valor');

        // Valor total já pago (soma das parcelas pagas)
        $pagos = Parcela::where('status', 'pago')
            ->sum('valor_pago');

        // Lucro (diferença entre o valor total dos contratos e o valor emprestado)
        $lucro = Contrato::sum(DB::raw('valor_total - valor_emprestimo'));

        // Dados para o gráfico de pagamentos por mês
        $pagamentosPorMes = Parcela::where('status', 'pago')
            ->whereYear('data_pagamento', Carbon::now()->year)
            ->selectRaw('MONTH(data_pagamento) as mes, SUM(valor_pago) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get()
            ->pluck('total', 'mes')
            ->toArray();

        // Preencher meses sem pagamentos com zero
        $pagamentosPorMesCompleto = array_fill(1, 12, 0);
        foreach ($pagamentosPorMes as $mes => $total) {
            $pagamentosPorMesCompleto[$mes] = $total;
        }

        // Dados para o gráfico de novos clientes por mês
        $novosClientesPorMes = Cliente::whereYear('created_at', Carbon::now()->year)
            ->selectRaw('MONTH(created_at) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get()
            ->pluck('total', 'mes')
            ->toArray();

        // Preencher meses sem novos clientes com zero
        $novosClientesPorMesCompleto = array_fill(1, 12, 0);
        foreach ($novosClientesPorMes as $mes => $total) {
            $novosClientesPorMesCompleto[$mes] = $total;
        }

        // Lista de clientes para o filtro
        $clientes = Cliente::orderBy('nome')->get();

        return view('dashboard', compact(
            'totalContratos',
            'faltaPagar',
            'pagos',
            'lucro',
            'pagamentosPorMesCompleto',
            'novosClientesPorMesCompleto',
            'clientes'
        ));
    }
}
