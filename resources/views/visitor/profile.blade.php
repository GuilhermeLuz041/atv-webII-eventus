@extends('layouts.home')

@section('title', 'Perfil Visitante')

@section('content')
<div class="max-w-4xl mx-auto p-6">


    <div class="relative bg-[#DECCBC] p-6 rounded-3xl shadow-md text-center mb-8">
 
        <a href="#" onclick="document.getElementById('editModal').classList.remove('hidden')"
           class="absolute top-4 right-4 text-[#0A2D35] hover:text-[#08232A]" title="Editar perfil">
            ✏️
        </a>

        @if ($user->avatar_path)
            <img src="{{ asset('storage/' . $user->avatar_path) }}" alt="Avatar" class="w-24 h-24 mx-auto rounded-full object-cover mb-4 border-2 border-[#0A2D35]">
        @else
            <div class="w-24 h-24 mx-auto rounded-full bg-[#D4C2B1] flex items-center justify-center text-3xl font-bold text-[#0A2D35] mb-4">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
        @endif

        <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
        <p class="text-gray-700">{{ $user->email }}</p>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 rounded-lg bg-green-100 border border-green-400 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <h3 class="text-xl font-semibold mb-4">Eventos Comprados</h3>

    
    @if($compras->isEmpty())
        <p class="text-gray-600">Você ainda não comprou ingressos para eventos.</p>
    @else
        <div class="grid grid-cols-1 gap-4">
            @foreach($compras as $compra)
                <div class="bg-white p-5 rounded-lg shadow hover:shadow-lg transition mb-4 flex justify-between items-start gap-4">
                    <div>
                        <h2 class="text-xl font-semibold">{{ $compra->ingresso->evento->nome }}</h2>
                        <p class="text-sm text-gray-600 mb-1">{{ $compra->ingresso->evento->descricao }}</p>
                        <p class="text-sm"><strong>Data:</strong> {{ \Carbon\Carbon::parse($compra->ingresso->evento->data_evento)->format('d/m/Y H:i') }}</p>
                        <p class="text-sm"><strong>Local:</strong> {{ $compra->ingresso->evento->local }}</p>

                        @php
                            $totalIngressosRestantes = $compra->ingresso->quantidade_disponivel;
                        @endphp

                        <p class="text-sm"><strong>Ingressos restantes:</strong> {{ $totalIngressosRestantes }}</p>
                    </div>

                    <div class="self-center flex flex-col gap-2">
                        <a href="{{ route('ingresso.pdf', $compra->ingresso->evento->id) }}" target="_blank"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                            🎟️ Gerar Ingresso
                        </a>

                        <form method="POST" action="{{ route('compras.cancelar', $compra->id) }}" onsubmit="return confirm('Cancelar compra?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                             ❌ Cancelar Compra
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
                
                
</div>

<div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg relative">
    <button onclick="document.getElementById('editModal').classList.add('hidden')"
            class="absolute top-2 right-3 text-gray-500 hover:text-gray-800 text-xl">&times;</button>

    <h3 class="text-lg font-semibold mb-4 text-[#0A2D35]">Editar Perfil</h3>

    <form action="{{ route('visitante.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
      @csrf
      @method('PUT')

      <div>
        <label for="name" class="block text-sm font-medium text-[#0A2D35] mb-1">Nome</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-[#0A2D35]">
      </div>

      <div>
        <label for="avatar" class="block text-sm font-medium text-[#0A2D35] mb-1">Foto de Perfil</label>
        <input type="file" id="avatar" name="avatar"
               class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-[#0A2D35] file:text-white hover:file:bg-[#08232A]">
      </div>

      <div class="text-right">
        <button type="submit"
                class="bg-[#0A2D35] text-white font-medium px-4 py-2 rounded hover:bg-[#08232A]">
          Salvar
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
