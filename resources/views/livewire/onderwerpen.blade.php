<div>
    @if(Session::has('message'))
        <script>setTimeout(function(){document.getElementById("message").classList.add("opacity-0")},3000);setTimeout(function(){document.getElementById("message").classList.add("hidden")},3700);</script>
        <div id="message" class="flex justify-center items-center duration-1000 transition-opacity">
            <div class="{{ Session::get('border') . ' ' . Session::get('bg') }} text-black border-l-4 p-4 w-1/2 mt-5">
                <p class="font-bold">
                    {{ Session::get('title') }}
                </p>
                <p>
                    {{ Session::get('message') }}
                </p>
            </div>
        </div>
    @endif

    <div class="flex flex-col items-center overflow-x-auto">

        <div class="flex bg-white mt-5 rounded-xl items-center flex-col overflow-auto pb-10 px-7 w-1/2">

            <div class="flex flex-wrap mb-5 mt-5 items-center">
                <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3 mr-56">
                    Onderwerpen
                </div>

                <div class="mb-5 mt-5 mr-5">
                    <select name="topic" id="topic"
                            class=" rounded-lg flex-1 appearance-none border border-amber-300 w-48 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        <option>Filter</option>
                    </select>
                </div>

                @role('admin')
                    <div class="mb-5 mt-5">
                            <button wire:click='$emit("openModal", "onderwerp-toevoegen")'
                                    class="py-2 px-4  bg-amber-500 hover:bg-amber-700 text-white w-full transition ease-in duration-200 text-center text-base font-semibold focus:outline-none rounded-lg ">
                                Onderwerp toevoegen
                            </button>
                    </div>
                @endrole

            </div>

            <div class="flex flex-wrap overflow-hidden overflow-y-auto">
                @if(!$topics->isEmpty())
                @foreach($topics as $topic)
                <div class="mb-5">
                    <button type="button"
                            class="mx-2 w-52 h-16 bg-amber-500 hover:bg-amber-700 text-white w-full transition ease-in duration-200 text-center text-base font-semibold focus:outline-none rounded-lg ">
                        {{$topic->name}}
                    </button>

                    <div class="flex flex-row justify-center mt-1">
                        <button wire:click='$emit("openModal", "onderwerp-wijzigen", {{ json_encode(["topic" => $topic]) }})'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="gray">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button wire:click='$emit("openModal", "onderwerp-verwijder-modal", {{ json_encode(["topic" => $topic]) }})'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="gray">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                @endforeach
                @else

                    <div class="flex justify-between text-center">
                        <a>Er zijn nog geen onderwerpen</a>
                    </div>

                @endif
    {{--end--}}


            </div>

        </div>
    </div>
</div>
