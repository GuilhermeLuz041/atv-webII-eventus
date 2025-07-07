@extends('layouts.home')

@section('title', 'Gerenciar Eventos')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-8">Gerenciar Eventos</h1>

    @if($eventos->isEmpty())
        <p class="text-gray-600">Nenhum evento encontrado.</p>
    @else
        <div class="space-y-4">
            @foreach($eventos as $evento)
                <div class="bg-white p-5 rounded-lg shadow flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-semibold">{{ $evento->nome }}</h2>
                        <p class="text-sm text-gray-600">{{ $evento->descricao }}</p>
                        <p class="text-sm"><strong>Data:</strong> {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y H:i') }}</p>
                        <p class="text-sm"><strong>Local:</strong> {{ $evento->local }}</p>
                        <p class="text-sm">
                            <strong>Status:</strong>
                            <span class="font-semibold
                                @if($evento->status_evento_id == 3) text-yellow-600
                                @elseif($evento->status_evento_id == 1) text-green-600
                                @elseif($evento->status_evento_id == 4) text-red-600
                                @else text-gray-600 @endif">
                                {{ $evento->status->nome ?? 'Sem status' }}
                            </span>
                        </p>
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{ route('admin.eventos.show', $evento->id) }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                            Ver Detalhes
                        </a>

                        <a href="{{ route('admin.eventos.edit', $evento->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Editar
                        </a>

                        @if($evento->status_evento_id == 3)
                            <form action="{{ route('admin.eventos.aprovar', $evento->id) }}" method="POST" onsubmit="return confirm('Deseja aprovar este evento?')" class="inline">
                                @csrf
                                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                                    Aprovar
                                </button>
                            </form>
                        @endif
                        <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" 
                            onsubmit="return confirm('Tem certeza que deseja deletar este evento?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Deletar
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $eventos->links() }}
        </div>
    @endif
</div>
@endsection
