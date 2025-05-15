<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ContratoController extends Controller
{
    public function index()
    {
        $contratos = Contrato::with('cliente')->latest()->paginate(10);
        return view('contratos.index', compact('contratos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('contratos.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'valor_emprestimo' => 'required|numeric|min:0',
            'porcentagem_juros' => 'required|numeric|min:0',
            'periodo_emprestimo' => 'required|integer|min:1',
            'valor_parcela_diaria' => 'required|numeric|min:0',
        ]);

        $valorTotal = $request->valor_emprestimo * (1 + $request->porcentagem_juros / 100);

        $contrato = Contrato::create([
            'cliente_id' => $request->cliente_id,
            'valor_emprestimo' => $request->valor_emprestimo,
            'porcentagem_juros' => $request->porcentagem_juros,
            'periodo_emprestimo' => $request->periodo_emprestimo,
            'valor_parcela_diaria' => $request->valor_parcela_diaria,
            'valor_total' => $valorTotal,
            'status' => 'ativo'
        ]);

        return redirect()->route('contratos.show', $contrato)
            ->with('success', 'Empréstimo cadastrado com sucesso!');
    }

    public function show(Contrato $contrato)
    {
        return view('contratos.show', compact('contrato'));
    }

    public function edit(Contrato $contrato)
    {
        $clientes = Cliente::all();
        return view('contratos.edit', compact('contrato', 'clientes'));
    }

    public function update(Request $request, Contrato $contrato)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'valor_emprestimo' => 'required|numeric|min:0',
            'porcentagem_juros' => 'required|numeric|min:0',
            'periodo_emprestimo' => 'required|integer|min:1',
            'valor_parcela_diaria' => 'required|numeric|min:0',
        ]);

        $valorTotal = $request->valor_emprestimo * (1 + $request->porcentagem_juros / 100);

        $contrato->update([
            'cliente_id' => $request->cliente_id,
            'valor_emprestimo' => $request->valor_emprestimo,
            'porcentagem_juros' => $request->porcentagem_juros,
            'periodo_emprestimo' => $request->periodo_emprestimo,
            'valor_parcela_diaria' => $request->valor_parcela_diaria,
            'valor_total' => $valorTotal,
        ]);

        return redirect()->route('contratos.show', $contrato)
            ->with('success', 'Empréstimo atualizado com sucesso!');
    }

    public function destroy(Contrato $contrato)
    {
        $contrato->delete();
        return redirect()->route('contratos.index')
            ->with('success', 'Empréstimo excluído com sucesso!');
    }
}
