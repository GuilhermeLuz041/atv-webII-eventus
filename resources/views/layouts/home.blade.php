<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Eventus')</title>

    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F2E3D5] text-[#0A2D35] font-sans min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-[#0A2D35] text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            
            <!-- Logo (esquerda) -->
            <a href="{{ url('/') }}" class="flex items-center space-x-2">
                <img src="{{ asset('images/LogoEventus.svg') }}" alt="Logo" class="h-8 w-auto">
                <span class="text-xl font-bold">Eventus</span>
            </a>

            <!-- Home (centro) -->
            @auth
                @php
                    $user = auth()->user();
                    $homeRoute = '#';
                    if ($user->role_id == 3) { // admin
                        $homeRoute = route('admin.dashboard');
                    } elseif ($user->role_id == 2) { // organizador
                        $homeRoute = route('organizer.dashboard');
                    } elseif ($user->role_id == 1) { // visitante
                        $homeRoute = route('visitor.dashboard');
                    }
                @endphp
                <div class="flex-1 flex justify-center">
                    <a href="{{ $homeRoute }}" class="text-white font-semibold hover:underline">
                        Home
                    </a>
                </div>
            @else
                <div class="flex-1"></div>
            @endauth

            <!-- Logout e Voltar (direita) -->
            <nav class="flex items-center space-x-4 text-sm md:text-base">
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:underline">Sair</button>
                    </form>
                @endauth

                @if (!request()->is('/') && !request()->is('login'))
                    <a href="{{ url()->previous() }}" 
                       class="bg-white text-[#0A2D35] px-4 py-2 rounded-md font-semibold hover:bg-gray-200 transition">
                        &larr; Voltar
                    </a>
                @endif
            </nav>
        </div>
    </header>

    <!-- Conteúdo principal -->
    <main class="flex-1">
        <div class="max-w-4xl mx-auto px-4 py-10">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#DECCBC] text-center text-sm text-[#0A2D35] py-4 shadow-inner">
        &copy; {{ date('Y') }} Eventus. Todos os direitos reservados.
    </footer>

</body>
</html>
