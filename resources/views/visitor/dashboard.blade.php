@extends('layouts.home')

@section('title', 'Eventos Disponíveis')

@section('content')
<div class="flex flex-col md:flex-row gap-8">

    <aside class="w-full md:w-1/3 bg-[#DECCBC] p-6 rounded-3xl shadow-md h-fit md:h-[240px] overflow-hidden">
        <a href="{{ route('visitor.profile') }}" class="block text-center no-underline hover:no-underline">
            <div class="w-24 h-24 mx-auto rounded-full bg-[#D4C2B1] flex items-center justify-center text-3xl font-bold text-[#0A2D35]">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <h2 class="text-xl font-semibold mt-4">{{ auth()->user()->name }}</h2>
            <p class="text-sm text-gray-700">{{ auth()->user()->email }}</p>
        </a>
    </aside>

    <section class="flex-1">
        <h1 class="text-3xl font-bold mb-4">Eventos Disponíveis</h1>

        @if($eventos->isEmpty())
            <p class="text-gray-600">Não há eventos disponíveis para compra no momento.</p>
        @else
            <div class="grid grid-cols-1 gap-2">
                @foreach($eventos as $evento)
                    <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition mb-4">
                        <h2 class="text-xl font-semibold">{{ $evento->nome }}</h2>
                        <p class="text-sm text-gray-600 mb-1">{{ $evento->descricao }}</p>
                        <p class="text-sm"><strong>Data:</strong> {{ \Carbon\Carbon::parse($evento->data_evento)->format('d/m/Y H:i') }}</p>
                        <p class="text-sm"><strong>Local:</strong> {{ $evento->local }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
</div>
@endsection
