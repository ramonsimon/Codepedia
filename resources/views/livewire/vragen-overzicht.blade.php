<div class="flex flex-row justify-center overflow-x-auto">

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
                    <input wire:model="title" type="text" name="name" id="name"
                           class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                           placeholder="Naam..." required/>
                </div>
                <select required wire:model="onderwerp_keuze" name="onderwerp_keuze" id="" class=" rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                @foreach($topics as $topic)

                    <option value="{{$topic->id}}">{{$topic->name}}</option>

                @endforeach
                </select>
                <div class="mb-2">
                </div>
                <div class="mb-2">
                    <textarea wire:model="description" name="question" id="question"
                              class=" rounded-lg flex-1 appearance-none border
                               border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm
                                text-base focus:outline-none focus:ring-2 focus:ring-purple-600
                                focus:border-transparent" placeholder="Vraag..." required></textarea>
                </div>
                <div style="width: 300px;">
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

            <div class="form-check flex flex-col justify-center items-center mr-3">
                <input wire:click="ownQuestions" class="form-check-input appearance-none h-4 w-4 border border-amber-300 rounded-sm bg-white checked:bg-amber-600 checked:border-amber-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                    Eigen vragen
                </label>
            </div>

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

        @if(!$questions->isEmpty())
            @foreach($questions as $question)
        <div x-data
             @click="const ignores = ['button','a','svg','path'];
                    if(!ignores.includes($el.tagName.toLowerCase())){
                        window.location=$refs.link.href;
                    }"

            class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="flex px-2 py-6">
                <div class="border-r border-gray-100 px-5 py-8 flex items-center">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">{{ $this->getVotes($question->id) }}</div>
                        <div class="text-gray-500">Votes</div>
                    </div>

                </div>

                <a href="#" class="flex-none ml-5 mt-4">
                    <img src="{{ $question->user->getAvatar() }}" alt="avatar"
                         class="w-14 h-14 rounded-xl">
                </a>
                <div class="ml-4">
                    <h4 class="text-xl font-semibold">
                        <a href="{{ route('vraag-bekijken', $question )}}" x-ref="link" class="hover:underline">{{$question->title}}@if($question->is_closed) (Gesloten) @endif</a>
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
                            <div class="text-gray-900">{{$question->comments->count()}} reacties</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 mt-3">
                        <div
                            class="bg-amber-500 text-white text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                            Open
                        </div>
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
