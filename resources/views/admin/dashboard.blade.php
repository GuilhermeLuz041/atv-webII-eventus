@extends('layouts.home')

@section('title', 'Dashboard Admin')

@section('content')
<div class="max-w-5xl mx-auto py-8">

    <h1 class="text-3xl font-bold mb-8">Dashboard Administrativa</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-[#DECCBC] p-6 rounded-3xl shadow text-center">
            <h2 class="text-xl font-semibold mb-2">Usuários</h2>
            <p class="text-4xl font-bold">{{ $totalUsuarios }}</p>
            <a href="" class="text-blue-700 hover:underline mt-4 inline-block">Gerenciar Usuários</a>
        </div>
        <div class="bg-[#DECCBC] p-6 rounded-3xl shadow text-center">
            <h2 class="text-xl font-semibold mb-2">Eventos</h2>
            <p class="text-4xl font-bold">{{ $totalEventos }}</p>
            <a href="{{ route('admin.eventos.index') }}" class="text-blue-700 hover:underline mt-4 inline-block">Gerenciar Eventos</a>
        </div>
        <div class="bg-[#DECCBC] p-6 rounded-3xl shadow text-center">
            <h2 class="text-xl font-semibold mb-2">Eventos Pendentes</h2>
            <p class="text-4xl font-bold">{{ $eventosPendentes }}</p>
            <a href="{{ route('admin.eventos.pendentes') }}" class="text-blue-700 hover:underline mt-4 inline-block">Ver Pendentes</a>
        </div>
    </div>

</div>
@endsection
