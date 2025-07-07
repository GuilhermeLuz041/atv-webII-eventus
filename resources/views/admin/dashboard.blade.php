@extends('layouts.home')

@section('title', 'Dashboard Admin')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-6">

    <h1 class="text-4xl font-extrabold mb-12 text-center text-gray-800">Dashboard Administrativa</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <div class="bg-[#DECCBC] p-8 rounded-3xl shadow-lg text-center flex flex-col items-center justify-center">
            <h2 class="text-2xl font-semibold mb-4">Usuários</h2>
            <p class="text-5xl font-bold text-[#0A2D35]">{{ $totalUsuarios }}</p>
            <a href="{{ route('admin.usuarios.index') }}" 
               class="mt-6 inline-block px-6 py-2 bg-[#0A2D35] text-white rounded-full font-semibold hover:bg-[#084246] transition">
               Gerenciar Usuários
            </a>
        </div>

        <div class="bg-[#DECCBC] p-8 rounded-3xl shadow-lg text-center flex flex-col items-center justify-center">
            <h2 class="text-2xl font-semibold mb-4">Eventos</h2>
            <p class="text-5xl font-bold text-[#0A2D35]">{{ $totalEventos }}</p>
            <a href="{{ route('admin.eventos.index') }}" 
               class="mt-6 inline-block px-6 py-2 bg-[#0A2D35] text-white rounded-full font-semibold hover:bg-[#084246] transition">
               Gerenciar Eventos
            </a>
        </div>

    </div>
</div>
@endsection
