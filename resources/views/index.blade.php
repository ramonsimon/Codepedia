<x-app-layout>
    <div class="flex flex-row justify-center">
        <div class="space-y-6 my-6 pr-2" style="width: 600px; ">
            <div class="mb-5">
                {{ $articles->links() }}
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
                            <div class="font-semibold text-2xl">{{ $article->articles_rating()->count() }}</div>
                            <div class="text-gray-500">Votes</div>
                        </div>

                    </div>
                    <div class="flex px-2 py-6">
                        <a href="#" class="flex-none">
                            <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                                 class="w-14 h-14 rounded-xl">
                        </a>
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
                                    <div class="text-gray-900">3 Comments</div>
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


        <div class="relative z-0">
            <div class="ml-9 mt-6 z-0" style="width: 500px; height: 500px;">
                <div class="flex flex-col fixed bg-white rounded-xl items-center pb-10 z-0" style="width: 500px; height: 500px;">
                    <div class="flex justify--center mb-5 mt-5 items-center">
                        <div class="flex justify-center text-black uppercase font-bold text-center text-xl mt-5 mb-3 mr-56">
                            <a>Onderwerpen</a>
                        </div>
                    </div>

                    <div class="flex flex-wrap justify-center overflow-hidden">
                        @if(!$topics->isEmpty())
                            @foreach($topics as $topic)
                                <div>
                                    <button type="button"
                                            class="w-52 h-16 mt-5 mx-2 bg-amber-500 hover:bg-amber-700 text-white w-full transition ease-in duration-200 text-center text-base font-semibold focus:outline-none rounded-lg ">
                                        {{$topic->name}}
                                    </button>
                                </div>

                            @endforeach
                                <div style="width: 300px;">
                                    <a href="{{route('artikel-overzicht')}}">
                                        <button type="submit"
                                                class="py-2 px-4 mt-16 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                                            Meer onderwerpen
                                        </button>
                                    </a>
                                </div>
                        @else

                            <div class="flex justify-between text-center">
                                <a>Er zijn nog geen onderwerpen</a>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
