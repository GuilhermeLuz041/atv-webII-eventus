@extends('layouts.home')

@section('title', 'Gerenciar Eventos')

@section('content')
<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold mb-6 text-center">Eventos - Administração</h1>

    @if($eventos->isEmpty())
        <p class="text-center text-gray-600">Nenhum evento encontrado.</p>
    @else
        <div class="space-y-4">
            @foreach($eventos as $evento)
                <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-semibold">{{ $evento->nome }}</h2>
                        <p class="text-sm text-gray-600">Criado por: {{ $evento->organizador->user->name }}</p>
                        <p class="text-sm">Status ID: {{ $evento->status_evento_id }}</p>
                    </div>
                    <a href="{{ route('admin.eventos.edit', $evento->id) }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                        Editar
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $eventos->links() }}
        </div>
    @endif

</div>
@endsection
