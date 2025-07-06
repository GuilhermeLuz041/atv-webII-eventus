@extends('layouts.home')

@section('title', 'Meus Eventos')

@section('content')
<div class="flex flex-col md:flex-row gap-8">

    <aside class="w-full md:w-1/3 bg-[#DECCBC] p-6 rounded-3xl shadow-md h-fit md:h-[240px] overflow-hidden">
        <a href="{{ route('organizer.profile') }}" class="block text-center no-underline hover:no-underline">
            <div class="w-24 h-24 mx-auto rounded-full bg-[#D4C2B1] flex items-center justify-center text-3xl font-bold text-[#0A2D35]">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <h2 class="text-xl font-semibold mt-4">{{ $user->name }}</h2>
            <p class="text-sm text-gray-700">{{ $user->email }}</p>
        </a>
    </aside>

    <section class="flex-1">
        <h1 class="text-3xl font-bold mb-4">Meus Eventos</h1>

        <div class="mb-6 flex justify-left">
            <a href="{{ route('eventos.create') }}" 
            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition text-sm shadow hover:shadow-lg">
                + Criar Evento
            </a>
        </div>

        @if($eventos->isEmpty())
            <p class="text-gray-600">Você ainda não criou nenhum evento.</p>
        @else
            <div class="grid grid-cols-1 gap-2">
                @foreach($eventos as $evento)
                    <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition mb-4 flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $evento->nome }}</h2>
                            <p class="text-sm text-gray-600 mb-1">{{ $evento->descricao }}</p>
                            <p class="text-sm"><strong>Data:</strong> {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y H:i') }}</p>
                            <p class="text-sm"><strong>Local:</strong> {{ $evento->local }}</p>

                            @php
                                $menorPreco = $evento->ingressos->min('preco');
                                $totalIngressosRestantes = $evento->ingressos->sum('quantidade_disponivel');
                            @endphp

                            <p class="text-sm"><strong>Preço a partir de:</strong> R$ {{ number_format($menorPreco, 2, ',', '.') }}</p>
                            <p class="text-sm"><strong>Ingressos restantes:</strong> {{ $totalIngressosRestantes }}</p>
                        </div>

                        <div class="ml-4 self-center">
                            <a href="{{ route('eventos.edit', $evento->id) }}" 
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition text-sm">
                                Editar
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</div>
@endsection
