@extends('layouts.home')

@section('title', 'Detalhes do Evento')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-8 rounded-3xl shadow-lg">

    <h1 class="text-3xl font-bold mb-6">{{ $evento->nome }}</h1>

    <div class="space-y-3 text-gray-700">
        <p><strong>Descrição:</strong> {{ $evento->descricao }}</p>
        <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y H:i') }}</p>
        <p><strong>Local:</strong> {{ $evento->local }}</p>
        <p><strong>Categoria:</strong> {{ $evento->categoria->nome ?? 'Não especificado' }}</p>
        <p>
            <strong>Status atual:</strong> 
            <span class="font-semibold
                @if($evento->status_evento_id == 3) text-yellow-600
                @elseif($evento->status_evento_id == 1) text-green-600
                @elseif($evento->status_evento_id == 4) text-red-600
                @else text-gray-600 @endif">
                {{ $evento->status->nome ?? 'Sem status' }}
            </span>
        </p>
        <p><strong>Organizador:</strong> {{ $evento->organizador->user->name }} ({{ $evento->organizador->user->email }})</p>
    </div>

    <div class="mt-8 flex justify-center gap-6">
        <form method="POST" action="{{ route('admin.eventos.aprovar', $evento->id) }}" onsubmit="return confirm('Deseja aprovar este evento?')">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition">
                Aprovar
            </button>
        </form>

        <form method="POST" action="{{ route('admin.eventos.rejeitar', $evento->id) }}" onsubmit="return confirm('Deseja rejeitar este evento?')">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-6 py-3 rounded-xl hover:bg-red-700 transition">
                Rejeitar
            </button>
        </form>
    </div>

</div>
@endsection
