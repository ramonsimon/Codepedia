<div class="flex flex-col items-center overflow-x-auto">
    @section('title')
        Codepedia - Artikelenbeheer
    @endsection
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
    <div class="flex bg-white ml-9 mt-5 rounded-xl items-center flex-col overflow-auto pb-10"
         style="width: 1000px;">
        <div class="flex space-x-96 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                Alle artikelen
            </div>
            <div class="flex flex-row h-10">
                <select name="name" id="name" wire:model="topic"
                        class="rounded-lg flex-1 appearance-none border border-amber-300 w-40 mr-2 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent">

                    <option value="all">Onderwerpen</option>
                    @foreach($topics as $topic)
                        <option value="{{$topic->id}}">{{$topic->name}}</option>
                    @endforeach
                </select>
                <div class="flex relative mr-2">
                    <input type="text" name="name" id="name" wire:model="search"
                           class="rounded-l-lg flex-1 appearance-none border border-amber-300 w-36 py-2 px-2
                               bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base
                               focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-transparent"
                           placeholder="Zoeken"/>
                    <span
                        class="rounded-r-md inline-flex items-center px-2 border-t bg-amber-500 border-l border-b  border-amber-500 text-gray-500 shadow-sm text-sm"
                        style="width: 40px">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="white">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"/>
                            </svg>
                    </span>
                </div>

            </div>
        </div>

        <div class="w-11/12">

            <table class="table p-4 bg-gray-100 rounded-lg mb-2 w-full">
                <thead>
                <tr>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Artikel
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Onderwerp
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Omschrijving
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Votes
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Wijzigen
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Verwijderen
                    </th>
                </tr>
                </thead>
                <tbody>

                <div class="mb-1">
                    {{ $articles->links() }}
                </div>
                @foreach($articles as $article)
                    <tr class="text-gray-700">
                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            {{$article->title}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            {{ $article->topic->name }}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            {{$article->sub_description}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            {{$this->getvotes($article->id)}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            <button wire:click='$emit("openModal", "artikel-wijzigen", {{ json_encode(["article" => $article]) }})'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="gray">
                                <path
                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                                <path fill-rule="evenodd"
                                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                      clip-rule="evenodd"/>
                            </svg>
                            </button>
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            <button
                                wire:click='$emit("openModal", "artikel-verwijder-modal", {{ json_encode(["article" => $article]) }})'>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="gray">
                                    <path fill-rule="evenodd"
                                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
                {{--                End article--}}
                </tbody>
            </table>
            <a class="" href="{{ route('artikel-toevoegen') }}">
                <button type="button"
                        class="py-2 px-8  bg-amber-500 hover:bg-amber-700 text-white w-full transition ease-in duration-200 text-center text-base font-semibold focus:outline-none rounded-lg ">
                    Artikel toevoegen
                </button>
            </a>

        </div>
    </div>
</div>
