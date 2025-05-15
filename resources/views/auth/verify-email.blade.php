@extends('layouts.app')

@section('title', 'Verificar email')

@section('content')
<div class="min-h-[calc(100vh-8rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 mb-4">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">
                    Verifique seu email
                </h2>
                <p class="text-gray-600">
                    Um link de verificação foi enviado para seu email
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-6 p-4 bg-green-50 rounded-lg">
                    <p class="text-sm text-green-700">
                        Um novo link de verificação foi enviado para o endereço de email que você forneceu durante o registro.
                    </p>
                </div>
            @endif

            <div class="text-center">
                <p class="text-sm text-gray-600 mb-6">
                    Antes de continuar, por favor verifique seu email para obter o link de verificação.
                    Se você não recebeu o email, clique no botão abaixo para solicitar um novo.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                        Reenviar email de verificação
                    </button>
                </form>

                <div class="mt-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:underline transition duration-200">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
