@extends('layouts.home')

@section('title', 'Recuperar Senha')

@section('content')
<div class="max-w-md mx-auto p-8 bg-[#EADACB] rounded-2xl shadow-lg mt-16">
    <h2 class="text-2xl font-semibold mb-6 text-[#0A2D35] text-center">Recuperar Senha</h2>

    <p class="mb-6 text-[#0A2D35] text-center">
        Informe seu e-mail que enviaremos um link para redefinir sua senha.
    </p>

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-[#0A2D35] mb-2">Email</label>
            <input id="email" name="email" type="email" required autofocus
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition"
                value="{{ old('email') }}" />
            @error('email')
                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" 
            class="w-full bg-[#0A2D35] text-white font-semibold py-3 rounded-lg hover:bg-[#08232A] transition">
            Enviar Link de Recuperação
        </button>
    </form>
</div>
@endsection
