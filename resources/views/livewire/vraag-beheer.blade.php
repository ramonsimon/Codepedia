<div class="flex flex-col items-center overflow-x-auto">
    @section('title')
        Codepedia - Vragenbeheer
    @endsection

    <div class="flex bg-white ml-9 mt-5 rounded-xl items-center flex-col overflow-auto pb-10"
         style="width: 1000px;">
        <div class="flex space-x-96 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                Alle vragen
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

        <div class="w-11/12 flex items-center justify-center">

            <table class="table p-4 bg-gray-100 rounded-lg w-full">
                <thead>
                <tr>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Vraag
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Omschrijving
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Onderwerp
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Openen
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Sluiten
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Verwijderen
                    </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                    <tr class="text-gray-700">
                        <td class="border-b-2 p-4 dark:border-dark-5 w-1/12 truncate text-center">
                           {{Str::limit($question->title, 10, $end='...')}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5 w-12 truncate text-center">
                           {{Str::limit($question->description, 10, $end='...')}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            {{Str::limit($question->topic->name, 10, $end='...')}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            <button @if(!$question->is_closed) @endif wire:click="open({{$question->id}})" class="@if(!$question->is_closed) bg-amber-600 cursor-not-allowed @else bg-amber-500 @endif text-white w-24 h-8 rounded-lg">
                                Openen
                            </button>
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            <button @if($question->is_closed) disabled @endif wire:click="close({{$question->id}})" class="@if($question->is_closed) bg-amber-600 cursor-not-allowed @else bg-amber-500 @endif text-white w-24 h-8 rounded-lg">
                                Sluiten
                            </button>
                        </td>

                        <td class="border-b-2 p-4 dark:border-dark-5 text-center">
                            <button type="button" wire:click='$emit("openModal", "vraag-verwijder-modal", {{ json_encode(["question" => $question]) }})'>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-6" viewBox="0 0 20 20" fill="gray">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            </button>
                        </td>

                    </tr>
                    @endforeach


                </tbody>
            </table>

        </div>
    </div>
</div>
