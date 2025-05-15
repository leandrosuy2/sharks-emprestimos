@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-900">Editar Cliente</h1>
        <a href="{{ route('clientes.index') }}" class="text-gray-600 hover:text-gray-900 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Voltar
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label for="nome" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ old('nome', $cliente->nome) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('nome')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="whatsapp" class="block text-sm font-medium text-gray-700">WhatsApp</label>
                    <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp', $cliente->whatsapp) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('whatsapp')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="cpf" class="block text-sm font-medium text-gray-700">CPF</label>
                    <input type="text" name="cpf" id="cpf" value="{{ old('cpf', $cliente->cpf) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('cpf')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $cliente->email) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                    <input type="text" name="cep" id="cep" value="{{ old('cep', $cliente->cep) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('cep')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="rua" class="block text-sm font-medium text-gray-700">Rua</label>
                    <input type="text" name="rua" id="rua" value="{{ old('rua', $cliente->rua) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('rua')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="numero" class="block text-sm font-medium text-gray-700">Número</label>
                    <input type="text" name="numero" id="numero" value="{{ old('numero', $cliente->numero) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('numero')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="complemento" class="block text-sm font-medium text-gray-700">Complemento</label>
                    <input type="text" name="complemento" id="complemento" value="{{ old('complemento', $cliente->complemento) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('complemento')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="bairro" class="block text-sm font-medium text-gray-700">Bairro</label>
                    <input type="text" name="bairro" id="bairro" value="{{ old('bairro', $cliente->bairro) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('bairro')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="cidade" class="block text-sm font-medium text-gray-700">Cidade</label>
                    <input type="text" name="cidade" id="cidade" value="{{ old('cidade', $cliente->cidade) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('cidade')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                    <input type="text" name="estado" id="estado" value="{{ old('estado', $cliente->estado) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                    @error('estado')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('clientes.index') }}" class="px-4 py-2 text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-150 ease-in-out">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#1B4D3E] to-[#2E8B57] text-white rounded-lg hover:from-[#2E8B57] hover:to-[#1B4D3E] transition duration-150 ease-in-out">
                    Atualizar Cliente
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Máscara para o CPF
    document.getElementById('cpf').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        e.target.value = value;
    });

    // Máscara para o WhatsApp
    document.getElementById('whatsapp').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        value = value.replace(/(\d{2})(\d)/, '($1) $2');
        value = value.replace(/(\d{5})(\d)/, '$1-$2');
        e.target.value = value;
    });

    // Máscara para o CEP
    document.getElementById('cep').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        value = value.replace(/(\d{5})(\d)/, '$1-$2');
        e.target.value = value;
    });
</script>
@endpush
@endsection
