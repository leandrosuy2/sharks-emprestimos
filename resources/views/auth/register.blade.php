@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="max-w-md w-full">
    <div class="bg-gradient-to-br from-[#0B1C3D] to-[#0B1C3D] rounded-2xl shadow-2xl p-8 border-2 border-[#0B1C3D]">
        <div class="text-center mb-6">
            <div class="mx-auto flex items-center justify-center mb-4">
                <img src="{{ asset('imagens/logo.png') }}" alt="CobraCerta" class="h-30 w-auto">
            </div>
        </div>

        <form class="space-y-4" action="{{ route('register.post') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-200 mb-1">Nome completo</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <input id="name" name="name" type="text" required
                            class="block w-full pl-10 pr-3 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200"
                            placeholder="Seu nome completo">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-200 mb-1">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input id="email" name="email" type="email" required
                            class="block w-full pl-10 pr-3 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200"
                            placeholder="seu@email.com">
                    </div>
                </div>

                <div>
                    <label for="whatsapp" class="block text-sm font-medium text-gray-200 mb-1">WhatsApp</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <input id="whatsapp" name="whatsapp" type="text" required
                            class="block w-full pl-10 pr-3 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200"
                            placeholder="(00) 00000-0000">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-200 mb-1">Senha</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" required
                                class="block w-full pl-10 pr-3 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-200 mb-1">Confirmar senha</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="password_confirmation" name="password_confirmation" type="password" required
                                class="block w-full pl-10 pr-3 py-2 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200"
                                placeholder="••••••••">
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-[#0B1C3D] bg-[#FFD700] hover:bg-[#FFE44D] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FFD700] transition duration-200">
                    Criar conta
                </button>
            </div>
        </form>

        <div class="mt-4">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300/30"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-transparent text-gray-200">
                        Já tem uma conta?
                    </span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('login') }}"
                    class="w-full flex justify-center py-2.5 px-4 border border-[#FFD700] rounded-lg shadow-sm text-sm font-medium text-[#FFD700] bg-transparent hover:bg-[#FFD700]/10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FFD700] transition duration-200">
                    Fazer login
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
