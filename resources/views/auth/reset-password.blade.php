@extends('layouts.app')

@section('title', 'Redefinir senha')

@section('content')
<div class="min-h-[calc(100vh-8rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <div class="bg-gradient-to-br from-[#1B4D3E] to-[#2E8B57] rounded-2xl shadow-2xl p-8 border-2 border-[#1B4D3E]">
            <div class="text-center mb-6">
                <div class="mx-auto flex items-center justify-center mb-4">
                    <img src="{{ asset('imagens/logo.png') }}" alt="CobraCerta" class="h-30 w-auto">
                </div>
                <h2 class="text-3xl font-bold text-white mb-2">
                    Redefinir senha
                </h2>
                <p class="text-gray-200">
                    Digite sua nova senha abaixo
                </p>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-200 mb-1">
                        Email
                    </label>
                    <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus
                        class="block w-full px-4 py-3 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200 @error('email') border-red-300 @enderror">
                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-200 mb-1">
                        Nova senha
                    </label>
                    <input id="password" name="password" type="password" required
                        class="block w-full px-4 py-3 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200 @error('password') border-red-300 @enderror">
                    @error('password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-200 mb-1">
                        Confirmar nova senha
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="block w-full px-4 py-3 bg-white/10 border border-gray-300/30 rounded-lg text-white placeholder-gray-300 focus:ring-2 focus:ring-[#FFD700] focus:border-[#FFD700] transition duration-200">
                </div>

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-[#1B4D3E] bg-[#FFD700] hover:bg-[#FFE44D] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FFD700] transition duration-200">
                        Redefinir senha
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
</div>
@endsection
