<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::latest()->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'cpf' => 'required|string|max:14|unique:clientes',
            'email' => 'required|email|unique:clientes',
            'cep' => 'required|string|max:9',
            'rua' => 'required|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Cliente criado com sucesso!'
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'cpf' => 'required|string|max:14|unique:clientes,cpf,' . $cliente->id,
            'email' => 'required|email|unique:clientes,email,' . $cliente->id,
            'cep' => 'required|string|max:9',
            'rua' => 'required|string|max:255',
            'complemento' => 'nullable|string|max:255',
            'numero' => 'required|string|max:10',
            'bairro' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Cliente atualizado com sucesso!'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('toast', [
                'type' => 'success',
                'message' => 'Cliente excluído com sucesso!'
            ]);
    }
}
