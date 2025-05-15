@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-900">Editar Contrato</h1>
        <a href="{{ route('contratos.index') }}" class="flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-150 ease-in-out">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Voltar
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('contratos.update', $contrato) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Cliente -->
                <div class="space-y-2">
                    <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <select id="cliente_id" name="cliente_id" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                            <option value="">Selecione um cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $contrato->cliente_id == $cliente->id ? 'selected' : '' }}>
                                    {{ $cliente->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('cliente_id')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tipo de Empréstimo -->
                <div class="space-y-2">
                    <label for="tipo_emprestimo" class="block text-sm font-medium text-gray-700">Tipo de Empréstimo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <select id="tipo_emprestimo" name="tipo_emprestimo" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                            <option value="">Selecione o tipo</option>
                            <option value="Pessoal" {{ $contrato->tipo_emprestimo == 'Pessoal' ? 'selected' : '' }}>Pessoal</option>
                            <option value="Consignado" {{ $contrato->tipo_emprestimo == 'Consignado' ? 'selected' : '' }}>Consignado</option>
                            <option value="Com Garantia" {{ $contrato->tipo_emprestimo == 'Com Garantia' ? 'selected' : '' }}>Com Garantia</option>
                        </select>
                    </div>
                    @error('tipo_emprestimo')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Período de Empréstimo -->
                <div class="space-y-2">
                    <label for="periodo_emprestimo" class="block text-sm font-medium text-gray-700">Período de Empréstimo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <select id="periodo_emprestimo" name="periodo_emprestimo" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out">
                            <option value="">Selecione o período</option>
                            <option value="30 dias" {{ $contrato->periodo_emprestimo == '30 dias' ? 'selected' : '' }}>30 dias</option>
                            <option value="60 dias" {{ $contrato->periodo_emprestimo == '60 dias' ? 'selected' : '' }}>60 dias</option>
                            <option value="90 dias" {{ $contrato->periodo_emprestimo == '90 dias' ? 'selected' : '' }}>90 dias</option>
                            <option value="120 dias" {{ $contrato->periodo_emprestimo == '120 dias' ? 'selected' : '' }}>120 dias</option>
                            <option value="180 dias" {{ $contrato->periodo_emprestimo == '180 dias' ? 'selected' : '' }}>180 dias</option>
                        </select>
                    </div>
                    @error('periodo_emprestimo')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Valor do Empréstimo -->
                <div class="space-y-2">
                    <label for="valor_emprestimo" class="block text-sm font-medium text-gray-700">Valor do Empréstimo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="text" id="valor_emprestimo" name="valor_emprestimo" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out"
                            value="R$ {{ number_format($contrato->valor_emprestimo, 2, ',', '.') }}">
                    </div>
                    @error('valor_emprestimo')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Porcentagem de Juros -->
                <div class="space-y-2">
                    <label for="porcentagem_juros" class="block text-sm font-medium text-gray-700">Porcentagem de Juros</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <input type="text" id="porcentagem_juros" name="porcentagem_juros" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out"
                            value="{{ number_format($contrato->porcentagem_juros, 2, ',', '.') }}%">
                    </div>
                    @error('porcentagem_juros')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Multa por Atraso -->
                <div class="space-y-2">
                    <label for="multa_atraso" class="block text-sm font-medium text-gray-700">Multa por Atraso (Diário)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="text" id="multa_atraso" name="multa_atraso" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out"
                            value="R$ {{ number_format($contrato->multa_atraso, 2, ',', '.') }}">
                    </div>
                    @error('multa_atraso')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('contratos.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-150 ease-in-out">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-gradient-to-r from-[#1B4D3E] to-[#2E8B57] text-white rounded-lg hover:from-[#2E8B57] hover:to-[#1B4D3E] transition duration-150 ease-in-out">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function(){
        // Aplicar máscaras
        $('#valor_emprestimo').mask('R$ 000.000.000,00', {reverse: true});
        $('#multa_atraso').mask('R$ 000.000.000,00', {reverse: true});
        $('#porcentagem_juros').mask('00,00%', {reverse: true});

        // Formatar valores antes do envio
        $('form').submit(function() {
            // Remover R$ e converter vírgula para ponto
            let valorEmprestimo = $('#valor_emprestimo').val().replace('R$ ', '').replace('.', '').replace(',', '.');
            let multaAtraso = $('#multa_atraso').val().replace('R$ ', '').replace('.', '').replace(',', '.');
            let porcentagemJuros = $('#porcentagem_juros').val().replace('%', '').replace(',', '.');

            // Atualizar os valores nos campos ocultos
            $('#valor_emprestimo').val(valorEmprestimo);
            $('#multa_atraso').val(multaAtraso);
            $('#porcentagem_juros').val(porcentagemJuros);
        });
    });
</script>
@endpush
@endsection
