@extends('layouts.home')

@section('title', 'Eventus')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-[2fr_3fr] gap-10 items-center min-h-[70vh]">


  <div class="mx-auto max-w-lg space-y-5 text-center">
        <h1 class="text-5xl font-extrabold text-[#0A2D35] leading-tight mb-6">
            Bem-vindo ao <span class="text-[#0A2D35]">Eventus</span>!
        </h1>

        <p class="text-lg text-[#4a4a4a] leading-relaxed">
            Sua plataforma <span class="font-semibold text-[#0A2D35]">fácil e rápida</span> para marcar e comprar ingressos para os <span class="text-[#0A2D35] font-semibold">melhores eventos</span> da cidade.
        </p>

        <p class="text-lg text-[#4a4a4a] leading-relaxed">
            Descubra <span class="underline decoration-[#EADACB] decoration-2 underline-offset-4 hover:decoration-[#0A2D35] cursor-pointer transition">shows</span>, <span class="underline decoration-[#EADACB] decoration-2 underline-offset-4 hover:decoration-[#0A2D35] cursor-pointer transition">palestras</span>, <span class="underline decoration-[#EADACB] decoration-2 underline-offset-4 hover:decoration-[#0A2D35] cursor-pointer transition">workshops</span> e muito mais, tudo em um só lugar.
        </p>

        <p class="text-lg text-[#4a4a4a] leading-relaxed">
            Navegue pelas categorias, escolha seu evento favorito e <span class="font-semibold text-[#0A2D35]">garanta sua entrada</span> com segurança e praticidade.
        </p>

        <p class="text-lg text-[#4a4a4a] leading-relaxed italic font-semibold">
            Aproveite uma experiência simples, segura e feita para conectar você às suas paixões.
        </p>
    </div>

  
  <div class="bg-[#EADACB] p-10 rounded-2xl shadow-lg max-w-[40rem] mx-auto">
    <h2 class="text-2xl font-semibold mb-6 text-[#0A2D35] text-center">Entrar na conta</h2>
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
      @csrf
      <div>
        <label for="email" class="block text-sm font-medium text-[#0A2D35] mb-2">Email</label>
        <input type="email" name="email" id="email" required autofocus
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition" />
      </div>
      <div>
        <label for="password" class="block text-sm font-medium text-[#0A2D35] mb-2">Senha</label>
        <input type="password" name="password" id="password" required
               class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0A2D35] focus:border-[#0A2D35] transition" />
        
        <div class="text-center mt-2">
          <a href="{{ route('password.request') }}" class="text-sm text-[#0A2D35] underline hover:text-[#074440]">
            Esqueceu a senha?
          </a>
        </div>

      </div>
      <button type="submit" class="w-full bg-[#0A2D35] text-white font-semibold py-3 rounded-lg hover:bg-[#08232A] transition">
        Entrar
      </button>
    </form>
    <p class="mt-6 text-center text-sm text-[#0A2D35]">
      Não tem conta?
      <a href="{{ route('register') }}" class="underline hover:text-[#074440]">Registre-se aqui</a>
    </p>
  </div>

</div>
@endsection
