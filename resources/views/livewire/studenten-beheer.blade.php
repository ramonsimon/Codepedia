<div class="flex flex-col items-center overflow-x-auto">

    <div class="flex bg-white ml-9 mt-5 rounded-xl items-center flex-col overflow-auto pb-10"
         style="width: 1000px;">
        <div class="flex space-x-96 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl">
                Te accepteren studenten
            </div>

        </div>

        <div class="w-11/12">

            <table class="table p-4 bg-gray-100 rounded-lg" style="width: 900px;">
                <thead>
                <tr>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Voornaam
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Achternaam
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Email
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Accepteren
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Weigeren
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($astudents as $astudent )
                <tr class="text-gray-700">
                    <td class="border-b-2 p-4 dark:border-dark-5">
                        {{$astudent->name}}
                    </td>
                    <td class="border-b-2 p-4 dark:border-dark-5">
                        hier komt achternaam student
                    </td>
                    <td class="border-b-2 p-4 dark:border-dark-5">
                        {{$astudent->email}}
                    </td>
                    <td class="border-b-2 p-4 dark:border-dark-5">
                        <button wire:click="acceptStudent({{$astudent->id}})" class="bg-green-500 text-white w-24 h-8 rounded-lg">
                            Accepteren
                        </button>
                    </td>
                    <td class="border-b-2 p-4 dark:border-dark-5">
                        <button class="bg-red-500 text-white w-24 h-8 rounded-lg">
                            Weigeren
                        </button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="flex bg-white ml-9 mt-5 mb-10 rounded-xl items-center flex-col overflow-auto pb-10"
         style="width: 1000px;">
        <div class="flex space-x-96 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl">
                Wijzig active accounts
            </div>

        </div>

        <div class="w-11/12">

            <table class="table p-4 bg-gray-100 rounded-lg" style="width: 900px;">
                <thead>
                <tr>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Voornaam
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Achternaam
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Email
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Blokkeren
                    </th>
                    <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                        Deblokkeren
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user )
                    <tr class="text-gray-700">
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            {{$user->name}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            hier komt achternaam student
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            {{$user->email}}
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <button class="bg-green-500 text-white w-24 h-8 rounded-lg">
                                Blokkeren
                            </button>
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <button class="bg-red-500 text-white w-24 h-8 rounded-lg disabled:opacity-60" disabled>
                                Deblokkeren
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
