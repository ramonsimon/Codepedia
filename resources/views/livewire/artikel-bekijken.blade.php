<x-app-layout>
    <div class="flex flex-row justify-center overflow-x-auto">
        <div class="flex bg-white ml-9 mt-5 rounded-xl flex-col pb-10 mb-10"
             style="width: 1000px;">
            <div class="flex ml-1 px-2 py-6 mb-8">
                <div class="border-r border-gray-100 px-5 py-8 mr-8">
                    <div class="text-center">
                        <div class="font-semibold text-2xl">{{$article->articles_rating()->count()}}</div>
                        <div class="text-gray-500">Votes</div>
                    </div>
                    <div class="flex justify-center mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <div class="mx-4 mr-10">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline">{{$article->title}}</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        {!! $article->description !!}
                    </div>
                </div>
            </div>


            <div class="flex flex-col items-center justify-center">


                <div class="flex flex-col items-center justify-center">
                    <div class="flex space-x-96 mb-5">
                        <div class="text-black uppercase font-bold text-center text-l mt-5 mb-3">
                            Reageren
                        </div>
                    </div>

                    <form wire:submit.prevent="submit">
                        <div class="flex mb-2 w-72">
                    <input type="text" id="name" wire:model="comment"
                              class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                              placeholder="Reactie..."/>
                        </div>

                            <button type="submit"
                                    class="w-72 py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                                Reageer
                            </button>
                    </form>
                </div>

                <!-- alleen zichtbaar als er reacties zijn -->
                @forelse($article->comments as $comment)
                    <div class="flex flex-col items-center justify-center">
                        <div class="flex space-x-96 mb-5">
                            <div class="text-black uppercase font-bold text-center text-l mt-5 mb-3">
                                Reacties
                            </div>
                            <div style="width: 600px;">
                                <div class="flex flex-row">
                                    <h4 class="text-l font-semibold uppercase font-bold">
                                        <a href="#">Naam reageerder</a>
                                    </h4>

                                    <!-- alleen zichtbaar voor docenten en gebruiker die heeft gereageerd -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-10" viewBox="0 0 20 20"
                                         fill="gray">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                        <path fill-rule="evenodd"
                                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                              clip-rule="evenodd"/>
                                    </svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                         fill="gray">
                                        <path fill-rule="evenodd"
                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>

                                <div class="flex flex-row">
                                    <div class="flex text-gray-600 mt-3 line-clamp-3">
                                        {{$comment->body}}
                                    </div>

                                    <div class="flex flex-col ml-3 -mt-5">
                                        <div class="text-center">
                                            <div class="font-semibold text-xl">33</div>
                                            <div class="text-gray-500 text-l">Votes</div>
                                        </div>

                                        <div class="flex justify-center mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                                      clip-rule="evenodd"/>
                                            </svg>

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                                 fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <form class="flex flex-row h-12 mt-3">
                                    <div class="flex mb-2 w-96 mr-3">
                            <textarea type="text" name="name" id="name"
                                      class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                      placeholder="Naam..."></textarea>
                                    </div>
                                    <div style="width: 300px;">
                                        <button type="submit"
                                                class="w-36 py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                                            Reageer
                                        </button>
                                    </div>
                                </form>
                                {{--                        Sub comment--}}
                                <div class="mt-2" style="width: 550px; margin-left: 52px;">
                                    <div class="flex flex-row">
                                        <h4 class="text-l font-semibold uppercase font-bold">
                                            <a href="#">Naam reaguurder</a>
                                        </h4>

                                        <!-- alleen zichtbaar voor docenten en gebruiker die heeft gereageerd -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-10"
                                             viewBox="0 0 20 20"
                                             fill="gray">
                                            <path
                                                d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                            <path fill-rule="evenodd"
                                                  d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="text-gray-600 mt-3 line-clamp-3">
                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                        </div>

                                        <div class="flex flex-col ml-3 -mt-5">
                                            <div class="text-center">
                                                <div class="font-semibold text-m">12</div>
                                                <div class="text-gray-500 text-s">Votes</div>
                                            </div>

                                            <div class="flex justify-center mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                                          clip-rule="evenodd"/>
                                                </svg>

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <div class="mx-auto w70 mt-12">
                                        <div class="text-gray-400 text-center font-bold mt-6">Geen reacties</div>
                                    </div>
                                @endforelse

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
