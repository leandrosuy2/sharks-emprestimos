@extends('layouts.app')

@section('title', 'Recuperar senha')

@section('content')
<div class="max-w-md w-full">
    <div class="bg-gradient-to-br from-[#0B1C3D] to-[#0B1C3D] rounded-2xl shadow-2xl p-8 border-2 border-[#0B1C3D]">
        <div class="text-center mb-6">
            <div class="mx-auto flex items-center justify-center mb-4">
                <img src="{{ asset('imagens/logo.png') }}" alt="CobraCerta" class="h-30 w-auto">
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">
                Recuperar senha
            </h2>
            <p class="text-gray-200">
                Digite seu email para receber o link de recuperação
            </p>
        </div>

        <form class="space-y-6" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-200 mb-1">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                        </svg>
                    </div>
                    <input id="email" name="email" type="email" required
                        class="block w-full pl-10 pr-3 py-2.5 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200"
                        placeholder="seu@email.com">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-[#0B1C3D] bg-[#FFD700] hover:bg-[#FFE44D] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FFD700] transition duration-200">
                    Enviar link de recuperação
                </button>
            </div>
        </form>

        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300/30"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-transparent text-gray-200">
                        Lembrou sua senha?
                    </span>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('login') }}"
                    class="w-full flex justify-center py-3 px-4 border border-[#FFD700] rounded-lg shadow-sm text-sm font-medium text-[#FFD700] bg-transparent hover:bg-[#FFD700]/10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FFD700] transition duration-200">
                    Voltar para o login
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
