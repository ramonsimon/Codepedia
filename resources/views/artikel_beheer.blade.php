<x-app-layout>

    <div class="flex flex-col items-center overflow-x-auto">

        <div class="flex bg-white ml-9 mt-5 rounded-xl items-center flex-col overflow-auto pb-10"
             style="width: 1000px;">
            <div class="flex space-x-96 mb-5 mt-5 items-center">
                <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                    Alle artikelen
                </div>
                <div>
                    <a href="atrikel-toevoegen">
                        <button type="button" class="py-2 px-4  bg-amber-500 hover:bg-amber-700 text-white w-full transition ease-in duration-200 text-center text-base font-semibold focus:outline-none rounded-lg ">
                            Artikel toevoegen
                        </button>
                    </a>
                </div>
            </div>

            <div class="w-11/12">

                <table class="table p-4 bg-gray-100 rounded-lg" style="width: 900px;">
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
                            Wijzigen
                        </th>
                        <th class="border-b-2 p-4 whitespace-nowrap font-normal text-gray-900">
                            Verwijderen
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-gray-700">
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            php errors
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            PHP
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            Omschrijving komt hier, geen zin om meer te typen
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa-solid fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            C# switch
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            C#
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            Omschrijving komt hier, geen zin om meer te typen
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa fa-solid fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            Javascript var
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            Javascript
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            Omschrijving komt hier, geen zin om meer te typen
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa-solid fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            CSS tailwind
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            CSS
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            Omschrijving komt hier, geen zin om meer te typen
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa-solid fa-trash-can"></i>
                        </td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            HTML Tags
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            HTML
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            Omschrijving komt hier, geen zin om meer te typen
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </td>
                        <td class="border-b-2 p-4 dark:border-dark-5">
                            <i class="fa-solid fa-trash-can"></i>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

</x-app-layout>
