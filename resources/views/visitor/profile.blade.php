@extends('layouts.home')

@section('title', 'Perfil Visitante')

@section('content')
<div class="max-w-4xl mx-auto p-6">

    <div class="bg-[#DECCBC] p-6 rounded-3xl shadow-md text-center mb-8">
        <div class="w-24 h-24 mx-auto rounded-full bg-[#D4C2B1] flex items-center justify-center text-3xl font-bold text-[#0A2D35] mb-4">
            {{ strtoupper(substr($user->name, 0, 1)) }}
        </div>
        <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
        <p class="text-gray-700">{{ $user->email }}</p>
    </div>

    <h3 class="text-xl font-semibold mb-4">Eventos Comprados</h3>

    @if($eventos->isEmpty())
        <p class="text-gray-600">Você ainda não comprou ingressos para eventos.</p>
    @else
        <div class="grid grid-cols-1 gap-4">
            @foreach($eventos as $evento)
                <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition mb-4">
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
            @endforeach
        </div>
    @endif

</div>
@endsection
