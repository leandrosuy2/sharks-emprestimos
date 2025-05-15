@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md w-full">
    <div class="bg-[#0B1C3D] rounded-2xl shadow-2xl p-8 border-2 border-[#13294B]">
        <div class="text-center">
            <div class="mx-auto flex items-center justify-center">
                <img src="{{ asset('imagens/logo.png') }}" alt="CobraCerta" class="h-50 w-auto">
            </div>
        </div>

        <form class="space-y-6" action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="space-y-4">
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
                    <label for="password" class="block text-sm font-medium text-gray-200 mb-1">Senha</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" name="password" type="password" required
                            class="block w-full pl-10 pr-3 py-2.5 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200"
                            placeholder="••••••••">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                        class="h-4 w-4 text-[#FFD700] focus:ring-[#FFD700] border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-200">
                        Lembrar-me
                    </label>
                </div>

                <div class="text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-[#FFD700] hover:text-[#FFE44D] transition-colors duration-200">
                        Esqueceu sua senha?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#13294B] hover:bg-[#1A355F] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FFD700] transition duration-200">
                    Entrar na conta
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
                        Não tem uma conta?
                    </span>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('register') }}"
                    class="w-full flex justify-center py-3 px-4 border border-[#FFD700] rounded-lg shadow-sm text-sm font-medium text-[#FFD700] bg-transparent hover:bg-[#FFD700]/10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FFD700] transition duration-200">
                    Criar nova conta
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
