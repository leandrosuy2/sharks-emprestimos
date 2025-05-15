@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-900">Detalhes do Cliente</h1>
        <div class="flex space-x-4">
            <a href="{{ route('clientes.edit', $cliente) }}" class="flex items-center px-4 py-2 bg-gradient-to-r from-[#1B4D3E] to-[#2E8B57] text-white rounded-lg hover:from-[#2E8B57] hover:to-[#1B4D3E] transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Editar
            </a>
            <a href="{{ route('clientes.index') }}" class="flex items-center text-gray-600 hover:text-gray-900">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Voltar
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-6">
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Informações Pessoais</h2>
                    <dl class="grid grid-cols-1 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">Nome</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->nome }}</dd>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">CPF</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->cpf }}</dd>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->email }}</dd>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">WhatsApp</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->whatsapp }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="space-y-6">
                <div>
                    <h2 class="text-lg font-medium text-gray-900 mb-4">Endereço</h2>
                    <dl class="grid grid-cols-1 gap-4">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">CEP</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->cep }}</dd>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">Rua</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->rua }}</dd>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">Número</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->numero }}</dd>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">Complemento</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->complemento ?? 'Não informado' }}</dd>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">Bairro</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->bairro }}</dd>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <dt class="text-sm font-medium text-gray-500">Cidade/Estado</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $cliente->cidade }}/{{ $cliente->estado }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
