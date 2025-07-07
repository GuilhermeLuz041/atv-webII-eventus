@extends('layouts.home')

@section('title', 'Editar Usuário')

@section('content')
<div class="max-w-xl mx-auto bg-white p-8 rounded-3xl shadow">
    <h1 class="text-2xl font-bold mb-6">Editar Usuário</h1>

    <form action="{{ route('admin.usuarios.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium">Nome</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-4 py-2" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-4 py-2" required>
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Atualizar
            </button>
        </div>
    </form>
</div>
@endsection
