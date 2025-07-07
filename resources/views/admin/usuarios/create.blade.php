@extends('layouts.home')

@section('title', 'Criar Novo Administrador')

@section('content')
<div class="max-w-md mx-auto py-10 px-6 bg-white rounded-lg shadow-md">

    <h1 class="text-2xl font-semibold mb-6 text-gray-800">Criar Novo Administrador</h1>

    <form action="{{ route('admin.usuarios.store') }}" method="POST" class="space-y-5">
        @csrf

        <label class="block text-gray-700 font-medium">Nome
            <input type="text" name="name" value="{{ old('name') }}" required
                class="mt-1 w-full rounded-md border border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 px-3 py-2" />
        </label>

        <label class="block text-gray-700 font-medium">Email
            <input type="email" name="email" value="{{ old('email') }}" required
                class="mt-1 w-full rounded-md border border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 px-3 py-2" />
        </label>

        <label class="block text-gray-700 font-medium">Senha
            <input type="password" name="password" required
                class="mt-1 w-full rounded-md border border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 px-3 py-2" />
        </label>

        <label class="block text-gray-700 font-medium">Confirmar Senha
            <input type="password" name="password_confirmation" required
                class="mt-1 w-full rounded-md border border-gray-300 focus:border-green-500 focus:ring focus:ring-green-200 focus:ring-opacity-50 px-3 py-2" />
        </label>

        <button type="submit"
            class="w-full bg-green-600 text-white font-semibold py-2 rounded hover:bg-green-700 transition">
            Criar Administrador
        </button>
    </form>
</div>
@endsection
