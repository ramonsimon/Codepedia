<div>
<div class="flex flex-row justify-center overflow-x-auto">

    @section('title')
        Codepedia - Vragenoverzicht
    @endsection

    @can('ask questions')
        <div class="flex bg-white mr-9 mt-6 rounded-xl items-center flex-col pb-10 h-1/4"
             style="width: 400px;">

            <div class="flex ml-52 mb-5 mt-5 items-center">
                <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3 mr-56" style="width: 300px;">
                    Vraag stellen
                </div>
            </div>

            <form wire:submit.prevent="submit" method="post" action="">
                <div class="flex flex-col mb-2">
                    <input wire:model="title" type="text" name="title" id="title"
                           class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                           placeholder="Naam..." required/>
                </div>
                <div class="mb-2">
                <select required wire:model="onderwerp_keuze" name="onderwerp_keuze" id="onderwerp_keuze" class=" rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                @foreach($topics as $topic)

                    <option value="{{$topic->id}}">{{$topic->name}}</option>

                @endforeach
                </select>
                </div>
                <div class="mb-2">
                    <x-head.question class="w-full" wire:model="description"/>
                </div>
                <div>
                    <button type="submit"
                            class="py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                        Stel vraag
                    </button>
                </div>
            </form>
        </div>
    @else
        @auth
            <div class="flex bg-white mr-9 mt-6 rounded-xl items-center flex-col pb-10 h-1/4"
                 style="width: 400px;">

                <div class="flex ml-52 mb-5 mt-5 items-center">
                    <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3 mr-56" style="width: 300px;">
                        Vraag stellen
                    </div>
                </div>

                <div>
                    <a>Je hebt nog geen rechten </a>
                </div>

            </div>
        @else
        <div class="flex bg-white mr-9 mt-6 rounded-xl items-center flex-col pb-10 h-1/4"
             style="width: 400px;">

            <div class="flex ml-52 mb-5 mt-5 items-center">
                <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3 mr-56" style="width: 300px;">
                    Vraag stellen
                </div>
            </div>

            <div>
                <a>Om vragen te stellen moet je <a href="{{route('login')}}" class="underline">inloggen</a></a>
            </div>

        </div>
            @endauth
    @endcan

    <div class="space-y-6 my-6">

        <div class="flex mb-5 mt-5 ml-10">

            @auth
                <div class="form-check flex flex-col justify-center items-center mr-3">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
                    <button type="button" wire:click="ownQuestions" class="{{$ownQuestions  ? "bg-amber-300" : "bg-gray-200"}} relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-300" role="switch" aria-checked="false">
                        <span class="sr-only"></span>
                        <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                        <span aria-hidden="true" class="{{$ownQuestions  ? "translate-x-5" : "translate-x-0"}} pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                    </button>
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        Eigen vragen
                    </label>

                </div>
            @endif

            <div class="flex relative mr-3">
                <select wire:model="topic" name="name" id="name"
                        class="rounded-lg flex-1 appearance-none border border-amber-300 w-40 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">
                    <option value="all">Onderwerpen</option>
                    @foreach($topics as $topic)
                        <option value="{{$topic->id}}">{{$topic->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex relative mr-3">
                <select name="filter" id="filter" wire:model="filter"
                        class=" rounded-lg flex-1 appearance-none border border-amber-300 w-48 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option value="ascending">A-Z</option>
                    <option value="descending">Z-A</option>
                    <option value="newest">Nieuwste</option>
                    <option value="oldest">Oudste</option>
                </select>
            </div>
            <div class="flex relative mr-3">
                <input type="text" name="name" id="name" wire:model="search"
                       class="rounded-l-lg flex-1 appearance-none border border-amber-300 w-36 py-2 px-4
                           bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base
                           focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                       placeholder="Zoeken"/>
                <span
                    class="rounded-r-md inline-flex items-center px-3 border-t bg-amber-500 border-l border-b  border-amber-500 text-gray-500 shadow-sm text-sm"
                    style="width: 40px">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"/>
                            </svg>
                    </span>
            </div>

        </div>

        {{ $questions->links() }}

    @if(!$questions->isEmpty())
            @foreach($questions as $question)
        <div class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="flex px-2 py-6">
                <div class="border-r border-gray-100 px-5 py-8 flex items-center">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">{{ $this->getVotes($question->id) }}</div>
                        <div class="text-gray-500">Votes</div>
                    </div>
                </div>

                <a class="flex-none ml-5 mt-4">
                    <img src="{{ $question->user->getAvatar() }}" alt="avatar"
                         class="w-14 h-14 rounded-xl">
                </a>
                <div class="ml-4">
                    <h4 class="text-xl font-semibold">
                        <a href="{{ route('vraag-bekijken', $question )}}" x-data="{}" x-ref="link" class="hover:underline">{{$question->title}} {{ $question->is_closed ? '(Gesloten)' : '' }}</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        {{$question->sub_description}}
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>{{ $question->created_at->diffForHumans() }}</div>
                            <div>&bull;</div>
                            <div>{{$question->topic->name }}</div>
                            <div>&bull;</div>
                            <div>{{$question->user->name }}</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">{{$question->comments->count()}} reacties</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 mt-3">
                        <a href="{{ route('vraag-bekijken', $question )}}" x-data="{}" x-ref="link">
                            <div
                                class="bg-amber-500 text-white text-xxs font-bold uppercase leading-none rounded-full text-center py-2 px-2 flex justify-center items-center">
                                Open
                            </div>
                        </a>
                        @if($question->user->id == Auth::id())
                            <button wire:click='$emit("openModal", "vraag-wijzigen", {{ json_encode(["question" => $question]) }})' type="button"
                                    class="bg-amber-500 text-white text-xxs font-bold uppercase leading-none rounded-full text-center py-2 px-2 flex justify-center items-center">
                                aanpassen
                            </button>
                            <button type="button" wire:click='$emit("openModal", "vraag-verwijder-modal", {{ json_encode(["question" => $question]) }})'
                                class="bg-amber-500 text-white text-xxs font-bold uppercase leading-none rounded-full text-center py-2 px-2 flex justify-center items-center">
                                verwijderen
                            </button>
                        @else
                            @role('admin')
                                <button type="button" wire:click='$emit("openModal", "vraag-verwijder-modal", {{ json_encode(["question" => $question]) }})'
                                        class="bg-amber-500 text-white text-xxs font-bold uppercase leading-none rounded-full text-center py-2 px-2 flex justify-center items-center">
                                    verwijderen
                                </button>
                            @endrole


                        @endif

                    </div>
                </div>
            </div>
        </div> <!-- end idea-container -->
            @endforeach
        @else
            <div class="flex justify-center items-center text-center">
                <a>Geen vragen gevonden.</a>
            </div>
        @endif
    </div>
</div>
</div>
