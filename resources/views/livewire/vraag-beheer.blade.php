<div class="flex flex-col items-center overflow-x-auto">

    <div class="flex bg-white ml-9 mt-5 rounded-xl items-center flex-col overflow-auto pb-10"
         style="width: 1000px;">
        <div class="flex space-x-96 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                Alle vragen
            </div>

        </div>

        <div class="w-11/12">

            <table class="table p-4 bg-gray-100 rounded-lg" style="width: 900px;">
                <thead>
                <tr>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Vraag
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Omschrijving
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
                        <td class="border-b-2 p-4 dark:border-dark-5">
                           {{$question->title}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                           {{$question->description}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <button class="bg-amber-500 text-white w-24 h-8 rounded-lg">
                                Sluiten
                            </button>
                        </td>

                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <button type="button" wire:click.prevent="delete">
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
