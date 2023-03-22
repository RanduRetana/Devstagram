<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        <title>Devstagram - @yield('titulo')</title>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    
    <body class="bg-gray-200">
        <header class="bg-white shadow-md py-6 px-6">
            <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-extrabold">
                Devstagram
            </h1>

            @auth
                <nav class="flex gap-2 items-center">
                    <a class="flex items-center gap-2 bg-white border p-2 text-gray-500 rounded text-sm uppercase font-bold cursor-pointer" href="{{route('posts.create')}}">
                        Crear
                    </a>
                    <a class="font-bold uppercase text-gray-600 text-sm" 
                    href="{{route('posts.index', auth()->user()->username)}}">
                    HOLA, 
                    <span class="font-normal">
                    {{auth()->user()->username}} 
                    </a>
                    <form method="POST" action="{{route('logout')}}">@csrf <button type="submit" class="font-bold uppercase text-gray-600 text-sm"><span class="p-2">
                        Cerrar sesión</button>
                    </form>
                </nav>
            @endauth

            @guest
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="/login">Login</a>
                    <a class="font-bold uppercase text-gray-600 text-sm" href="/register">Crear cuenta</a>
                </nav>
            @endguest

            
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
        @yield('contenido')
    </main>

    <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
        Devstagram - Todos los derechos reservados
        {{--helper--}}
        {{ now()->year }}
    </footer>

    </body>
</html>
