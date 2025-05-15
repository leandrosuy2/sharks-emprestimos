@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-900">Detalhes do Empréstimo</h1>
        <div class="flex space-x-4">
            <button onclick="pagarTodasParcelas()" class="flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Pagar Todas as Parcelas
            </button>
            <a href="{{ route('contratos.index') }}" class="flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Voltar
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Informações do Cliente -->
            <div class="space-y-4">
                <h2 class="text-lg font-medium text-gray-900">Informações do Cliente</h2>
                <div class="space-y-2">
                    <p class="text-sm text-gray-600">Nome:</p>
                    <p class="text-sm font-medium text-gray-900">{{ $contrato->cliente->nome }}</p>
                </div>
                <div class="space-y-2">
                    <p class="text-sm text-gray-600">WhatsApp:</p>
                    <p class="text-sm font-medium text-gray-900">{{ $contrato->cliente->whatsapp }}</p>
                </div>
            </div>

            <!-- Informações do Empréstimo -->
            <div class="space-y-4">
                <h2 class="text-lg font-medium text-gray-900">Informações do Empréstimo</h2>
                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Valor Emprestado:</p>
                        <p class="text-sm font-medium text-gray-900">R$ {{ number_format($contrato->valor_emprestimo, 2, ',', '.') }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Juros:</p>
                        <p class="text-sm font-medium text-gray-900">{{ number_format($contrato->porcentagem_juros, 2, ',', '.') }}%</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Período:</p>
                        <p class="text-sm font-medium text-gray-900">{{ $contrato->periodo_emprestimo }} dias</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Parcela Diária:</p>
                        <p class="text-sm font-medium text-gray-900">R$ {{ number_format($contrato->valor_parcela_diaria, 2, ',', '.') }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Valor Total:</p>
                        <p class="text-sm font-medium text-gray-900">R$ {{ number_format($contrato->valor_total, 2, ',', '.') }}</p>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600">Status:</p>
                        <p class="text-sm font-medium text-gray-900">{{ $contrato->status }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Parcelas -->
        <div class="mt-8">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Parcelas</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Parcela
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Valor
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Data de Vencimento
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Data de Pagamento
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($contrato->parcelas as $parcela)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $parcela->numero_parcela }}ª parcela
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    R$ {{ number_format($parcela->valor, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $parcela->data_vencimento->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($parcela->status === 'pago')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Pago
                                        </span>
                                    @elseif($parcela->status === 'atrasado')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Atrasado
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Pendente
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $parcela->data_pagamento ? $parcela->data_pagamento->format('d/m/Y') : '-' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @if($parcela->status !== 'pago')
                                        <button onclick="pagarParcela({{ $parcela->id }}, {{ $parcela->valor }})" class="text-green-600 hover:text-green-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Pagamento -->
<div id="pagamentoModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-6 border w-[500px] shadow-lg rounded-lg bg-white">
        <div class="mt-3">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-900">Registrar Pagamento</h3>
                <button onclick="fecharModalPagamento()" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form id="pagamentoForm" method="POST" class="space-y-6">
                @csrf

                <!-- Valor da Parcela -->
                <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-500">Valor da Parcela:</span>
                        <span class="text-lg font-semibold text-gray-900" id="valorParcela">R$ 0,00</span>
                    </div>
                </div>

                <!-- Valor Pago -->
                <div class="space-y-2">
                    <label for="valor_pago" class="block text-sm font-medium text-gray-700">Valor Pago</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">R$</span>
                        </div>
                        <input type="text" name="valor_pago" id="valor_pago" required
                            class="pl-8 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E]"
                            placeholder="0,00"
                            onkeyup="formatarValor(this)">
                    </div>
                </div>

                <!-- Data do Pagamento -->
                <div class="space-y-2">
                    <label for="data_pagamento" class="block text-sm font-medium text-gray-700">Data do Pagamento</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="date" name="data_pagamento" id="data_pagamento" required
                            class="pl-10 block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E]">
                    </div>
                </div>

                <!-- Forma de Pagamento -->
                <div class="space-y-2">
                    <label for="forma_pagamento" class="block text-sm font-medium text-gray-700">Forma de Pagamento</label>
                    <select name="forma_pagamento" id="forma_pagamento" required
                        class="block w-full h-11 rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E]">
                        <option value="">Selecione a forma de pagamento</option>
                        <option value="dinheiro">Dinheiro</option>
                        <option value="pix">PIX</option>
                        <option value="cartao">Cartão de Crédito/Débito</option>
                        <option value="transferencia">Transferência Bancária</option>
                    </select>
                </div>

                <!-- Observação -->
                <div class="space-y-2">
                    <label for="observacao" class="block text-sm font-medium text-gray-700">Observação</label>
                    <textarea name="observacao" id="observacao" rows="3"
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#1B4D3E] focus:ring-[#1B4D3E] resize-none"
                        placeholder="Adicione uma observação sobre o pagamento..."></textarea>
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <button type="button" onclick="fecharModalPagamento()"
                        class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition duration-150 ease-in-out">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-gradient-to-r from-[#1B4D3E] to-[#2E8B57] text-white rounded-lg hover:from-[#2E8B57] hover:to-[#1B4D3E] transition duration-150 ease-in-out">
                        Confirmar Pagamento
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function formatarValor(input) {
        // Remove tudo que não é número
        let valor = input.value.replace(/\D/g, '');

        // Converte para número e divide por 100 para ter os centavos
        valor = (parseInt(valor) / 100).toFixed(2);

        // Formata o número com separador de milhares e vírgula
        valor = valor.replace('.', ',');
        valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        // Atualiza o input
        input.value = valor;
    }

    function pagarParcela(parcelaId, valor) {
        const modal = document.getElementById('pagamentoModal');
        const form = document.getElementById('pagamentoForm');
        const valorParcela = document.getElementById('valorParcela');
        const valorPagoInput = document.getElementById('valor_pago');

        form.action = `/parcelas/${parcelaId}/pagar`;
        valorParcela.textContent = `R$ ${parseFloat(valor).toFixed(2).replace('.', ',')}`;
        valorPagoInput.value = parseFloat(valor).toFixed(2).replace('.', ',');
        modal.classList.remove('hidden');
    }

    function pagarTodasParcelas() {
        const modal = document.getElementById('pagamentoModal');
        const form = document.getElementById('pagamentoForm');
        const valorParcela = document.getElementById('valorParcela');
        const valorPagoInput = document.getElementById('valor_pago');

        form.action = `/contratos/{{ $contrato->id }}/pagar-todas`;
        valorParcela.textContent = `R$ {{ number_format($contrato->valor_total, 2, ',', '.') }}`;
        valorPagoInput.value = '{{ number_format($contrato->valor_total, 2, ',', '.') }}';
        modal.classList.remove('hidden');
    }

    function fecharModalPagamento() {
        const modal = document.getElementById('pagamentoModal');
        modal.classList.add('hidden');
    }

    // Fechar modal ao clicar fora
    window.onclick = function(event) {
        const modal = document.getElementById('pagamentoModal');
        if (event.target == modal) {
            fecharModalPagamento();
        }
    }

    // Definir data atual como padrão
    document.getElementById('data_pagamento').valueAsDate = new Date();

    // Adicionar evento de submit ao formulário
    document.getElementById('pagamentoForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Pegar o valor formatado e converter para número
        const valorPagoInput = document.getElementById('valor_pago');
        const valorFormatado = valorPagoInput.value;
        const valorNumerico = parseFloat(valorFormatado.replace('.', '').replace(',', '.'));

        // Criar um input hidden com o valor numérico
        const inputHidden = document.createElement('input');
        inputHidden.type = 'hidden';
        inputHidden.name = 'valor_pago';
        inputHidden.value = valorNumerico;

        // Remover o input original e adicionar o hidden
        valorPagoInput.remove();
        this.appendChild(inputHidden);

        // Enviar o formulário
        this.submit();
    });
</script>
@endpush
@endsection
