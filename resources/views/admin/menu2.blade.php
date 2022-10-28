<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @yield('head')
    </head>
    <body class="antialiased min-h-screen relative lg:flex" x-data="{open: false}">
        <nav class="absolute inset-0 transform lg:transform-none lg:opacity-100 duration-200 lg:sticky z-10 w-80 bg-indigo-900 text-white h-screen p-3"
        :class="{'translate-x-0 ease-in opacity-100':open == true, '-translate-x-full ease-out opacity-0':open == false}">
            <div class="flex justify-between">
                <span class="font-bold text-2xl sm:text-3xl p-2">Sidebar</span>
                <button class="p-2 focus:outline-none focus:bg-indigo-800 hover:bg-indigo-800 rounded-md lg:hidden" @click="open = false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            </div>

            <ul class="mt-8">
                <li>
                    <a href="{{ route('admin.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">Inicio</a>
                    <a href="{{ route('admin.clientes') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">Clientes</a>
                    <a href="{{ route('admin.ventas') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">Ventas</a>
                    <a href="{{ route('admin.articulos') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">Articulos</a>
                </li>
            </ul>
        </nav>

        <div class="relative z-0 lg:flex-grow">

            <header class="flex bg-gray-700 text-white items-center px-3">
                <button class="p-2 focus:outline-none focus:bg-gray-600 hover:bg-gray-600 rounded-md lg:hidden" @click="open = true">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                      </svg>
                </button>
                <span class="block text-2xl sm:text-3xl font-bold  p-4">Alphine</span>
            </header>

            <div class="py-4 px-4">

                @yield('content')
                
            </div>
        </div>

        @livewireScripts
        <script src="{{ asset('js/sid.js') }}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Livewire.on('alert', function(message) {
                Swal.fire(
                    'Bien hecho!',
                    message,
                    'success'
                )
            })

            Livewire.on('alert2', function(message) {
                Swal.fire(message)
            })
        </script>
        @yield('js')
    </body>
</html>
