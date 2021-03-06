<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Codepedia')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/tinymce.css') }}">


    @livewireStyles

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>

    @livewire('livewire-ui-modal')
    @livewireScripts
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>






</head>
<body class="font-sans antialiased bg-gray-300 overflow-x-hidden">
<header class="fixed w-screen flex items-center justify-between px-8 py-4 z-10 border-b-4 border-b-amber-400 bg-white">
    <a href="{{route('index')}}"><img src="{{asset('codepedia_logo.png')}}" class="h-14 w-14"/></a>
    <div class="flex-shrink-0 flex  items-center">
        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
            <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
            <a href="{{ route('vragen-overzicht') }}" class="@if(Route::current()->getName() === 'vragen-overzicht') border-b-amber-400 @endif border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"> Vragen </a>
            <a href="{{ route('artikel-overzicht') }}" class="@if(Route::current()->getName() === 'artikel-overzicht') border-b-amber-400 @endif border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"> Artikelen </a>
        </div>
        @if (Route::has('login'))
            <div class="px-6 py-4 sm:block">
                @guest
                    <a href="{{ route('login') }}"
                       class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Inloggen</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Registreren</a>
                    @endif
                @endguest
            </div>
        @endif
        @auth
            <div
                x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }
                                this.$refs.button.focus()
                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return
                                this.open = false
                                focusAfter && focusAfter.focus()
                            }
                        }"
                x-on:keydown.escape.prevent.stop="close($refs.button)"
                x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                x-id="['dropdown-button']"
                class="relative"
            >
                <!-- Button -->
                <button
                    x-ref="button"
                    x-on:click="toggle()"
                    :aria-expanded="open"
                    :aria-controls="$id('dropdown-button')"
                    type="button"
                >
                    <img src="{{ auth()->user()->getAvatar() }}" alt="avatar" class="w-10 h-10 rounded-full">
                </button>

                <!-- Panel -->
                <div
                    x-ref="panel"
                    x-show="open"
                    x-transition.origin.top.left
                    x-on:click.outside="close($refs.button)"

                    style="display: none;"
                    class="absolute left-0 -ml-36 w-52 bg-white border border-black rounded shadow-md overflow-hidden z-10"
                >
                    <div>
                        <a href="{{route('profiel-bewerken')}}"
                           class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500">Gegevens
                            bewerken
                        </a>

                        @role('admin')
                        <a href="{{route('docent-aanmaken')}}"
                           class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500">
                            Docentaccount maken
                        </a>

                        <a href="{{route('studenten-beheer')}}"
                           class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500">
                            Studentaccountsbeheer
                        </a>

                        <a href="{{route('artikel-beheer')}}"
                           class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500">
                            Artikelenbeheer
                        </a>

                        <a href="{{route('vraag-beheer')}}"
                           class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500">
                            Vragenbeheer
                        </a>

                        <a href="{{route('onderwerpen')}}"
                           class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500">
                            Onderwerpenbeheer
                        </a>
                        @endrole
                    </div>

                    <div class="border-t border-black">
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           disabled
                           class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500">
                            Uitloggen
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div>
</header>
<div class="w-screen px-8 py-12 border-b-4 invisible"></div>
<div>{{$slot}}</div>



</body>
</html>
