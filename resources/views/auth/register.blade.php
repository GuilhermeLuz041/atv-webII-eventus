@extends('layouts.home')

@section('title', 'Registrar - Eventus')

@section('content')
<div class="max-w-md mx-auto px-6 py-12 min-h-[70vh] flex items-center justify-center">

  <!-- Formulário de registro -->
  <div class="bg-[#EADACB] p-10 rounded-2xl shadow-lg w-full">
    <h2 class="text-2xl font-semibold mb-6 text-[#0A2D35] text-center">Criar nova conta</h2>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
      @csrf

      <div>
        <label for="name" class="block text-sm font-medium text-[#0A2D35] mb-2">Nome</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition" />
        @error('name')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="email" class="block text-sm font-medium text-[#0A2D35] mb-2">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition" />
        @error('email')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-[#0A2D35] mb-2">Senha</label>
        <input id="password" type="password" name="password" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition" />
        @error('password')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="role_id" class="block text-sm font-medium text-[#0A2D35] mb-2">Perfil</label>
        <select id="role_id" name="role_id" required
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition">
          @foreach ($roles as $role)
            <option value="{{ $role->id }}" @selected(old('role_id') == $role->id)>{{ ucfirst($role->nome) }}</option>
          @endforeach
        </select>
        @error('role_id')
          <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="w-full bg-[#0A2D35] text-white font-semibold py-3 rounded-lg hover:bg-[#08232A] transition">
        Registrar
      </button>
    </form>
  </div>

</div>
@endsection
