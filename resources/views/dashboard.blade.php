@extends('layouts.dashboard')

@section('content')
<div class="space-y-6">
    <!-- Filtros -->
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Filtros</h2>
        <form class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="relative">
                <label for="data_inicio" class="block text-sm font-medium text-gray-700 mb-1">Data Início</label>
                <div class="relative">
                    <input type="date" id="data_inicio" name="data_inicio"
                        class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-[#0B1C3D] focus:border-[#0B1C3D] transition-all duration-200
                        appearance-none">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="relative">
                <label for="data_fim" class="block text-sm font-medium text-gray-700 mb-1">Data Fim</label>
                <div class="relative">
                    <input type="date" id="data_fim" name="data_fim"
                        class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-[#0B1C3D] focus:border-[#0B1C3D] transition-all duration-200
                        appearance-none">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="relative">
                <label for="cliente" class="block text-sm font-medium text-gray-700 mb-1">Cliente</label>
                <div class="relative">
                    <select id="cliente" name="cliente"
                        class="w-full pl-4 pr-10 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-700
                        focus:outline-none focus:ring-2 focus:ring-[#0B1C3D] focus:border-[#0B1C3D] transition-all duration-200
                        appearance-none">
                        <option value="">Todos os Clientes</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="flex items-end">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#0B1C3D] to-[#0B1C3D] text-white py-2.5 px-4 rounded-lg
                    hover:from-[#0B1C3D] hover:to-[#0B1C3D] transition-all duration-300
                    focus:outline-none focus:ring-2 focus:ring-[#0B1C3D] focus:ring-opacity-50
                    flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <!-- Cards de Resumo -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 - Total Contratos -->
        <div class="bg-gradient-to-br from-[#0B1C3D] to-[#0B1C3D] rounded-lg p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium">Total Contratos</p>
                    <p class="text-3xl font-bold">{{ $totalContratos }}</p>
                </div>
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <!-- Card 2 - Falta Pagar -->
        <div class="bg-gradient-to-br from-[#DC2626] to-[#EF4444] rounded-lg p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium">Falta Pagar</p>
                    <p class="text-3xl font-bold">R$ {{ number_format($faltaPagar, 2, ',', '.') }}</p>
                </div>
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <!-- Card 3 - Pagos -->
        <div class="bg-gradient-to-br from-[#0B1C3D] to-[#0B1C3D] rounded-lg p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium">Pagos</p>
                    <p class="text-3xl font-bold">R$ {{ number_format($pagos, 2, ',', '.') }}</p>
                </div>
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>

        <!-- Card 4 - Lucro -->
        <div class="bg-gradient-to-br from-[#FFD700] to-[#FFA500] rounded-lg p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium">Lucro</p>
                    <p class="text-3xl font-bold">R$ {{ number_format($lucro, 2, ',', '.') }}</p>
                </div>
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- Gráficos -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Gráfico de Pagamentos -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Pagamentos por Mês</h3>
            <div class="h-80">
                <canvas id="pagamentosChart"></canvas>
            </div>
        </div>

        <!-- Gráfico de Clientes -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Novos Clientes</h3>
            <div class="h-80">
                <canvas id="clientesChart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Gráfico de Pagamentos
    const pagamentosCtx = document.getElementById('pagamentosChart').getContext('2d');
    new Chart(pagamentosCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: 'Pagamentos',
                data: @json(array_values($pagamentosPorMesCompleto)),
                borderColor: '#0B1C3D',
                backgroundColor: 'rgba(11, 28, 61, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        callback: function(value) {
                            return 'R$ ' + value.toLocaleString('pt-BR');
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Gráfico de Clientes
    const clientesCtx = document.getElementById('clientesChart').getContext('2d');
    new Chart(clientesCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            datasets: [{
                label: 'Novos Clientes',
                data: @json(array_values($novosClientesPorMesCompleto)),
                backgroundColor: '#0B1C3D',
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    },
                    ticks: {
                        stepSize: 1
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection
