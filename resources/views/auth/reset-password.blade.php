@extends('layouts.home')

@section('title', 'Redefinir Senha')

@section('content')
<div class="max-w-md mx-auto p-8 bg-[#EADACB] rounded-2xl shadow-lg mt-16">
    <h2 class="text-2xl font-semibold mb-6 text-[#0A2D35] text-center">Redefinir Senha</h2>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <label for="email" class="block text-sm font-medium text-[#0A2D35] mb-2">Email</label>
            <input id="email" name="email" type="email" required autofocus autocomplete="username"
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition"
                value="{{ old('email', $request->email) }}" />
            @error('email')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-[#0A2D35] mb-2">Nova Senha</label>
            <input id="password" name="password" type="password" required autocomplete="new-password"
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition" />
            @error('password')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-[#0A2D35] mb-2">Confirmar Nova Senha</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition" />
            @error('password_confirmation')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" 
            class="w-full bg-[#0A2D35] text-white font-semibold py-3 rounded-lg hover:bg-[#08232A] transition">
            Redefinir Senha
        </button>
    </form>
</div>
@endsection
