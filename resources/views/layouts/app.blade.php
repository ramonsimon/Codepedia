<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Codepedia</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-300">
        <header class="flex items-center justify-between px-8 py-4 border-b-4 border-b-amber-500 bg-white">
            <a href="{{route('index')}}"><img src="{{asset('codepedia_logo.png')}}" class="h-14 w-14"/></a>
                <div class="flex items-center">
                    @if (Route::has('login'))
                        <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Inloggen</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registreren</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    @auth
                        <a href="">
                            <img src=" https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                        </a>
                    @endauth
                </div>
        </header>
        <div>{{$slot}}</div>
        @livewireScripts
    </body>
</html>
