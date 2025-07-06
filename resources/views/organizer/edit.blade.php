@extends('layouts.home')

@section('title', 'Editar Evento')

@section('content')
<div class="max-w-md mx-auto px-6 py-12 min-h-[70vh] flex items-center justify-center">

  <div class="bg-[#EADACB] p-10 rounded-2xl shadow-lg w-full">
    <h2 class="text-2xl font-semibold mb-6 text-[#0A2D35] text-center">Editar Evento</h2>

    <form action="{{ route('eventos.update', $evento->id) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <div>
        <label for="nome" class="block text-sm font-medium text-[#0A2D35] mb-2">Nome do Evento</label>
        <input id="nome" type="text" name="nome" value="{{ old('nome', $evento->nome) }}" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0A2D35] transition" />
        @error('nome')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="descricao" class="block text-sm font-medium text-[#0A2D35] mb-2">Descrição</label>
        <textarea id="descricao" name="descricao" rows="3" required
                  class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0A2D35] transition">{{ old('descricao', $evento->descricao) }}</textarea>
        @error('descricao')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="data_evento" class="block text-sm font-medium text-[#0A2D35] mb-2">Data e Hora</label>
        <input id="data_evento" type="datetime-local" name="data_evento" 
               value="{{ old('data_evento', \Carbon\Carbon::parse($evento->data_evento)->format('Y-m-d\TH:i')) }}" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0A2D35] transition" />
        @error('data_evento')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="local" class="block text-sm font-medium text-[#0A2D35] mb-2">Local</label>
        <input id="local" type="text" name="local" value="{{ old('local', $evento->local) }}" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0A2D35] transition" />
        @error('local')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="categoria_id" class="block text-sm font-medium text-[#0A2D35] mb-2">Categoria</label>
        <select id="categoria_id" name="categoria_id" required
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0A2D35] transition">
          <option value="">Selecione uma categoria</option>
          @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" @selected(old('categoria_id', $evento->categoria_id) == $categoria->id)>
              {{ $categoria->nome }}
            </option>
          @endforeach
        </select>
        @error('categoria_id')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="status_evento_id" class="block text-sm font-medium text-[#0A2D35] mb-2">Status</label>
        <select id="status_evento_id" name="status_evento_id" required
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0A2D35] transition">
          <option value="">Selecione o status</option>
          @foreach($status as $s)
            <option value="{{ $s->id }}" @selected(old('status_evento_id', $evento->status_evento_id) == $s->id)>
              {{ $s->nome }}
            </option>
          @endforeach
        </select>
        @error('status_evento_id')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit"
              class="w-full bg-[#0A2D35] text-white font-semibold py-3 rounded-lg hover:bg-[#08232A] transition">
        Salvar Alterações
      </button>
    </form>
  </div>
</div>
@endsection
