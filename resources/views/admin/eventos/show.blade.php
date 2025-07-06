@extends('layouts.home')

@section('title', 'Detalhes do Evento')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-3xl shadow-lg">

    <h1 class="text-2xl font-bold mb-4">{{ $evento->nome }}</h1>

    <p><strong>Descrição:</strong> {{ $evento->descricao }}</p>
    <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y H:i') }}</p>
    <p><strong>Local:</strong> {{ $evento->local }}</p>
    <p><strong>Categoria:</strong> {{ $evento->categoria->nome ?? 'Não especificado' }}</p>
    <p><strong>Status atual:</strong> ID {{ $evento->status_evento_id }}</p>
    <p><strong>Organizador:</strong> {{ $evento->organizador->user->name }} ({{ $evento->organizador->user->email }})</p>

    <div class="mt-6 flex justify-center gap-4">
        <form method="POST" action="{{ route('admin.eventos.aprovar', $evento->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Aprovar
            </button>
        </form>

        <form method="POST" action="{{ route('admin.eventos.rejeitar', $evento->id) }}">
            @csrf
            @method('PATCH')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Rejeitar
            </button>
        </form>
    </div>

</div>
@endsection
