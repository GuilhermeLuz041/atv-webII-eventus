@extends('layouts.home')

@section('title', 'Criar Evento')

@section('content')
<div class="max-w-md mx-auto px-6 py-12 min-h-[70vh] flex items-center justify-center">

  <div class="bg-[#EADACB] p-10 rounded-2xl shadow-lg w-full">
    <h2 class="text-2xl font-semibold mb-6 text-[#0A2D35] text-center">Criar Novo Evento</h2>

    <form action="{{ route('eventos.store') }}" method="POST" class="space-y-6">
      @csrf

      <div>
        <label for="nome" class="block text-sm font-medium text-[#0A2D35] mb-2">Nome do Evento</label>
        <input id="nome" type="text" name="nome" value="{{ old('nome') }}" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] transition" />
        @error('nome')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="descricao" class="block text-sm font-medium text-[#0A2D35] mb-2">Descrição</label>
        <textarea id="descricao" name="descricao" rows="3" required
                  class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] transition">{{ old('descricao') }}</textarea>
        @error('descricao')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="data_evento" class="block text-sm font-medium text-[#0A2D35] mb-2">Data e Hora</label>
        <input id="data_evento" type="datetime-local" name="data_evento" value="{{ old('data_evento') }}" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] transition" />
        @error('data_evento')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="local" class="block text-sm font-medium text-[#0A2D35] mb-2">Local</label>
        <input id="local" type="text" name="local" value="{{ old('local') }}" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] transition" />
        @error('local')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="categoria_id" class="block text-sm font-medium text-[#0A2D35] mb-2">Categoria</label>
        <select id="categoria_id" name="categoria_id" required
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] transition">
          <option value="">Selecione uma categoria</option>
          @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
              {{ $categoria->nome }}
            </option>
          @endforeach
        </select>
        @error('categoria_id')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="preco_ingresso" class="block text-sm font-medium text-[#0A2D35] mb-2">Preço do Ingresso</label>
        <input id="preco_ingresso" type="number" step="1" min="0" name="preco_ingresso" value="{{ old('preco_ingresso') }}" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] transition" />
        @error('preco_ingresso')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="quantidade_total" class="block text-sm font-medium text-[#0A2D35] mb-2">Quantidade Total de Ingressos</label>
        <input id="quantidade_total" type="number" min="1" name="quantidade_total" value="{{ old('quantidade_total') }}" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] transition" />
        @error('quantidade_total')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit"
              class="w-full bg-[#0A2D35] text-white font-semibold py-3 rounded-lg hover:bg-[#08232A] transition">
        Criar Evento
      </button>
    </form>
  </div>
</div>
@endsection
