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
                        <div class="px-6 py-4 sm:block">

                            <a href="{{ route('vragen-overzicht') }}" class="mr-2 text-sm text-gray-700 dark:text-gray-500 underline">Vragen</a>
                            <a href="{{ route('onderwerpen') }}" class="mr-2 text-sm text-gray-700 dark:text-gray-500 underline">Onderwerpen</a>

                            @guest
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Inloggen</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-2 text-sm text-gray-700 dark:text-gray-500 underline">Registreren</a>
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
                                    <img src=" https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                                </button>

                                <!-- Panel -->
                                <div
                                    x-ref="panel"
                                    x-show="open"
                                    x-transition.origin.top.left
                                    x-on:click.outside="close($refs.button)"
                                    :id="$id('dropdown-button')"
                                    style="display: none;"
                                    class="absolute left-0 -ml-36 w-52 bg-white border border-black rounded shadow-md overflow-hidden z-10"
                                >
                                    <div>
                                        <a href="{{route('profiel-bewerken')}}" class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500" >
                                            Gegevens bewerken
                                        </a>

                                        @role('admin')
                                            <a href="{{route('docent-aanmaken')}}" class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500" >
                                                Docentaccount maken
                                            </a>

                                            <a href="{{route('index')}}" class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500" >
                                                Studentaccounts beheren
                                            </a>

                                            <a href="{{route('artikel-beheer')}}" class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500" >
                                                Artikelen beheer
                                            </a>

                                            <a href="{{route('vragen-overzicht')}}" class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500" >
                                                Vragen beheer
                                            </a>
                                        @endrole
                                    </div>

                                    <div class="border-t border-black">
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" disabled class="block w-full px-4 py-2 text-center text-sm hover:bg-gray-100 disabled:text-gray-500">
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
        <div>{{$slot}}</div>
        @livewireScripts
    </body>
</html>
