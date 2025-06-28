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
                    
                    <a href="" class="flex items-center space-x-2">
                        <img src="{{ asset('images/LogoEventus.svg') }}" alt="Logo" class="h-8 w-auto">
                        <span class="text-xl font-bold">Eventus</span>
                    </a>

                    <!-- Menu -->
                    <nav class="space-x-4 text-sm md:text-base">
                        @auth
                            <a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="hover:underline">Sair</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="hover:underline">Entrar</a>
                            <a href="{{ route('register') }}" class="hover:underline">Registrar</a>
                        @endauth
                    </nav>
                </div>
            </header>

            
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
