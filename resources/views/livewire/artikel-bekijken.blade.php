@if(Session::has('message'))
    <script>setTimeout(function () {
            document.getElementById("message").classList.add("opacity-0")
        }, 3000);
        setTimeout(function () {
            document.getElementById("message").classList.add("hidden")
        }, 3700);</script>
    <div id="message" class="flex justify-center items-center duration-1000 transition-opacity">
        <div class="{{ Session::get('border') . ' ' . Session::get('bg') }} text-black border-l-4 p-4 w-3/5 mt-5">
            <p class="font-bold">
                {{ Session::get('title') }}
            </p>
            <p>
                {{ Session::get('message') }}
            </p>
        </div>
    </div>
@endif
<div class="flex flex-row justify-center overflow-x-auto">
    <div class="flex bg-white ml-9 mt-5 rounded-xl flex-col pb-10 mb-10 w-1/2">

        <div class="flex ml-1 px-2 py-6 mb-8">
            <div class="border-r border-gray-100 px-5 py-8 mr-8">
                <div class="text-center">
                    <div
                        class="text-sm font-bold leading-none @if($has_voted) text-blue-600 @elseif($has_downvoted) text-red-600 @endif">
                        <a>{{ $this->article->rating }}</a>
                    </div>
                    <div class="text-gray-500">Votes</div>
                </div>
                <div class="flex justify-center mt-4">
                    @can('ask questions')
                        <button wire:click="vote(true)" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <button wire:click="vote(false)" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20"
                                 fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    @endcan
                </div>
            </div>
            <div class="">
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

                @can('ask questions')
                    <div class="flex mb-2 w-72">
                        <input type="text" wire:model="body"
                               class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                               placeholder="Reactie..."/>
                    </div>
                    <button wire:click="submit"
                            class="w-72 py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                        Reageer
                    </button>
                @else
                    <h3>Je hebt geen rechten om te reageren</h3>
                @endcan

                @error('body') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="text-black uppercase font-bold text-center text-l mt-5 mb-3">
                Reacties
            </div>
            @forelse($comments as $comment)
                <div class="flex flex-col items-center justify-center w-full">

                    <div
                        class="flex flex-col border-b border-gray-400 shadow-md pb-2 px-4 justify-center items-center mb-4 w-1/2">
                        <h4 class="text-l font-semibold font-bold w-full">
                            <a>{{ ucfirst(strtolower($comment->user->name)) . ' ' . ucfirst(strtolower($comment->user->last_name)) }}</a>
                        </h4>
                        <div class="flex justify-between text-gray-600 mt-3 line-clamp-3 w-full">
                            <div>{{ $comment->body }}</div>
                            <div class="">
                                <div class="text-center">
                                    <div class="text-sm font-bold leading-none">
                                        <a>{{ $this->commentRating($comment->id) }}</a>
                                    </div>
                                    <div class="text-gray-500">Votes</div>
                                </div>
                                @can('ask questions')
                                    @if(auth()->id() != $comment->user->id)
                                        <div class="flex justify-center">
                                            <button wire:click="commentVote(true, {{ $comment->id }})" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                            <button wire:click="commentVote(false, {{ $comment->id }})" type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                          clip-rule="evenodd"/>
                                                </svg>
                                            </button>
                                        </div>
                                    @endcan
                            </div>
                            @endif
                        </div>

                        <div class="flex flex-row items-center justify-center">
                            @if($comment->user->id == auth()->id())
                                <button
                                    wire:click='$emit("openModal", "reactie-wijzigen", {{ json_encode(["comment" => $comment, 'slug' => $article->slug, "type" => "question"]) }})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                         fill="gray">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                        <path fill-rule="evenodd"
                                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>

                                <button
                                    wire:click='$emit("openModal", "reactie-verwijderen", {{ json_encode(["comment" => $comment, 'slug' => $article->slug, "type" => "question"]) }})'>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                         fill="gray">
                                        <path fill-rule="evenodd"
                                              d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </button>
                            @endif
                                @can('ask questions')
                            <button wire:click="showDiv({{$comment->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                     fill="gray">
                                    <path fill-rule="evenodd"
                                          d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                                    @endcan
                        </div>
                    </div>
                </div>

                @if($showDiv == $comment->id)
                    <div class="mb-1 w-1/4">
                        <input id='title' type="text"
                               wire:model="sub_comment"
                               wire:keydown.enter="addReply({{$comment->id}})">

                    </div>
                    <button wire:click="addReply({{$comment->id}})"
                            class="w-1/4 py-1 px-2 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                        Reageer
                    </button>
                @endif

                @if(!is_null($comment->subcomments))
                    @foreach ($comment->subcomments as $subcomment)

                        <div class="flex flex-col items-center justify-center w-3/4">

                            <div
                                class="flex flex-col border-b border-gray-400 shadow-md pb-2 px-4 justify-center items-center mb-4 w-1/2">
                                <h4 class="text-l font-semibold font-bold w-full">
                                    <a>{{ ucfirst(strtolower($subcomment->user->name)) . ' ' . ucfirst(strtolower($subcomment->user->last_name)) }}</a>
                                </h4>
                                <div class="flex justify-between text-gray-600 mt-3 line-clamp-3 w-full">
                                    <div>{{ $subcomment->description }}</div>
                                </div>

                                <div class="flex flex-row items-center justify-center">
                                    @if($subcomment->user_id == auth()->id())
                                        <button
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                 fill="gray">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                                <path fill-rule="evenodd"
                                                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>

                                        <button
                                            >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                                                 fill="gray">
                                                <path fill-rule="evenodd"
                                                      d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                      clip-rule="evenodd"/>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endif

            @empty
                <div class="mx-auto w70 mt-12">
                    <div class="text-gray-400 text-center font-bold mt-6">Geen reacties</div>
                </div>
            @endforelse
            {{ $comments->links() }}


        </div>
    </div>
</div>
</div>
</div>


