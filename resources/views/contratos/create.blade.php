@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-900">Novo Contrato</h1>
        <a href="{{ route('contratos.index') }}" class="flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-150 ease-in-out">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Voltar
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <form id="emprestimoForm" action="{{ route('contratos.store') }}" method="POST" class="space-y-6">
            @csrf

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
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('cliente_id')
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
                        <input type="number" step="0.01" id="valor_emprestimo" name="valor_emprestimo" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out"
                            placeholder="R$ 0,00">
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
                        <input type="number" step="0.01" id="porcentagem_juros" name="porcentagem_juros" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out"
                            placeholder="0,00%">
                    </div>
                    @error('porcentagem_juros')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Quantidade de Dias -->
                <div class="space-y-2">
                    <label for="periodo_emprestimo" class="block text-sm font-medium text-gray-700">Quantidade de Dias</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="number" id="periodo_emprestimo" name="periodo_emprestimo" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out"
                            placeholder="0">
                    </div>
                    @error('periodo_emprestimo')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Valor da Parcela Diária -->
                <div class="space-y-2">
                    <label for="valor_parcela_diaria" class="block text-sm font-medium text-gray-700">Valor da Parcela Diária</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="number" step="0.01" id="valor_parcela_diaria" name="valor_parcela_diaria" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out"
                            placeholder="R$ 0,00">
                    </div>
                    @error('valor_parcela_diaria')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Valor da Multa -->
                <div class="space-y-2">
                    <label for="valor_multa" class="block text-sm font-medium text-gray-700">Valor da Multa por Atraso</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="number" step="0.01" id="valor_multa" name="valor_multa" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] transition duration-150 ease-in-out"
                            placeholder="R$ 0,00">
                    </div>
                    @error('valor_multa')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Resultados Calculados -->
            <div class="bg-gray-50 p-4 rounded-md">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Resultados</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-600">Valor Total a Pagar:</p>
                        <p id="valorTotal" class="text-lg font-semibold text-gray-900">R$ 0,00</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Valor da Parcela Diária:</p>
                        <p id="valorParcela" class="text-lg font-semibold text-gray-900">R$ 0,00</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Valor da Multa por Atraso:</p>
                        <p id="valorMulta" class="text-lg font-semibold text-gray-900">R$ 0,00</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('contratos.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-150 ease-in-out">
                    Cancelar
                </a>
                <button type="submit" class="px-4 py-2 bg-[#0B1C3D] text-white rounded-lg hover:bg-[#1a2a52] transition duration-150 ease-in-out">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('emprestimoForm');
    const valorEmprestimo = document.getElementById('valor_emprestimo');
    const porcentagemJuros = document.getElementById('porcentagem_juros');
    const periodoEmprestimo = document.getElementById('periodo_emprestimo');
    const valorParcelaDiaria = document.getElementById('valor_parcela_diaria');
    const valorMulta = document.getElementById('valor_multa');
    const valorTotal = document.getElementById('valorTotal');
    const valorParcela = document.getElementById('valorParcela');
    const valorMultaDisplay = document.getElementById('valorMulta');

    function calcularValorTotal() {
        const valor = parseFloat(valorEmprestimo.value) || 0;
        const juros = parseFloat(porcentagemJuros.value) || 0;

        // Calcula o valor total: valor do empréstimo + juros
        const total = valor + (valor * (juros / 100));
        valorTotal.textContent = `R$ ${total.toFixed(2)}`;
        return total;
    }

    function calcularParcelaDiaria() {
        const total = calcularValorTotal();
        const dias = parseInt(periodoEmprestimo.value) || 0;
        if (dias > 0) {
            // Parcela diária = valor total / número de dias
            const parcela = total / dias;
            valorParcela.textContent = `R$ ${parcela.toFixed(2)}`;
            valorParcelaDiaria.value = parcela.toFixed(2);
            return parcela;
        }
        return 0;
    }

    // Eventos para cálculo automático
    valorEmprestimo.addEventListener('input', function() {
        calcularParcelaDiaria();
    });

    porcentagemJuros.addEventListener('input', function() {
        calcularParcelaDiaria();
    });

    periodoEmprestimo.addEventListener('input', function() {
        calcularParcelaDiaria();
    });

    valorParcelaDiaria.addEventListener('input', function() {
        const valor = parseFloat(valorEmprestimo.value) || 0;
        const parcela = parseFloat(valorParcelaDiaria.value) || 0;
        const dias = parseInt(periodoEmprestimo.value) || 0;

        if (valor > 0 && parcela > 0 && dias > 0) {
            const total = parcela * dias;
            const juros = ((total - valor) / valor) * 100;
            porcentagemJuros.value = juros.toFixed(2);
            valorTotal.textContent = `R$ ${total.toFixed(2)}`;
        }
    });

    // Atualiza o display da multa quando o valor é alterado
    valorMulta.addEventListener('input', function() {
        valorMultaDisplay.textContent = `R$ ${parseFloat(valorMulta.value || 0).toFixed(2)}`;
    });
});
</script>
@endpush
@endsection
