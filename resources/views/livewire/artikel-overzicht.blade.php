<div class="flex flex-row justify-center overflow-x-auto">
    <div class="space-y-6 my-6" style="width: 800px">
        <h2 class="font-bold text-2xl flex justify-center">Artikelen</h2>
        <div class="flex mb-5 mt-5" style="width: 400px;">
            <div class="flex relative mr-3">

                <select name="name" id="name" wire:model="topic"
                        class="rounded-lg flex-1 appearance-none border border-amber-300 w-40 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">

                        <option value="all">Onderwerpen</option>
                    @foreach($topics as $topic)
                        <option value="{{$topic->id}}">{{$topic->name}}</option>
                    @endforeach
                </select>
            </div>

{{--            <div class="flex relative mr-3">--}}
{{--                <select name="name" id="name" wire:model="filter"--}}
{{--                        class="rounded-lg flex-1 appearance-none border border-amber-300 w-36 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">--}}
{{--                    <option value="all">Filter</option>--}}
{{--                    <option value="most-recent">Meest recent</option>--}}
{{--                    <option value="least-recent">Minst recent</option>--}}
{{--                    <option value="most-likes">Meeste likes</option>--}}
{{--                    <option value="least-likes">Minste likes</option>--}}
{{--                </select>--}}
{{--            </div>--}}

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
        @if(!$articles->isEmpty())
            @foreach($articles as $article)
                <div
                    x-data
                    @click="const ignores = ['button','a','svg','path'];
                    if(!ignores.includes($el.tagName.toLowerCase())){
                        window.location=$refs.link.href;
                    }"

                    class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer"
                >
                    <div class="border-r border-gray-100 px-5 py-8 flex items-center">
                        <div class="text-center">
                            <div class="font-semibold text-2xl">{{ $this->getVotes($article->id) }}</div>
                            <div class="text-gray-500">Votes</div>
                        </div>

                    </div>
                    <div class="flex px-2 py-6">
                        <div class="mx-4">
                            <h4 class="text-xl font-semibold">
                                <a href="{{ route('artikel-bekijken', $article) }}" x-ref="link" class=hover:underline">{{$article->title}}</a>
                            </h4>
                            <div class=" mt-3 line-clamp-3">
                                {{$article->sub_description}}
                            </div>

                            <div class="flex items-center justify-between mt-6">
                                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                    <div>{{ $article->created_at->diffForHumans() }}</div>
                                    <div>&bull;</div>
                                    <div>{{ $article->topic->name }}</div>
                                    <div>&bull;</div>
                                    <div class="text-gray-900">{{$article->comments->count()}} reacties</div>
                                </div>
                                <!--<div class="flex items-center space-x-2">
                                    <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">Open</div>
                                    <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                        <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                        <ul class="absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
                                            <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                            <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                                        </ul>
                                    </button>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div> <!-- end idea-container -->
            @endforeach

        @else

            <div class="flex justify-center text-center">
                <a>Er zijn nog geen artikelen</a>
            </div>

        @endif

    </div>

</div>
