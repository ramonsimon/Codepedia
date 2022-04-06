<div class="flex flex-row justify-center overflow-x-auto">

    <!-- moet allemaal diabled worden als je niet ingelogd bent -->
    <div class="flex bg-white mr-9 mt-6 rounded-xl items-center flex-col pb-10"
         style="width: 400px;">

        <div class="flex ml-52 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3 mr-56" style="width: 300px;">
                Vraag stellen
            </div>
        </div>

        <form method="post" action="">
            <div class="flex flex-col mb-2">
                <input type="text" name="name" id="name"
                       class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                       placeholder="Naam..."/>
            </div>
            <div class="mb-2">
                <select name="topic" id="topic"
                        class=" rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                </select>
            </div>
            <div class="mb-2">
                <textarea name="topic" id="topic"
                          class=" rounded-lg flex-1 appearance-none border
                           border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm
                            text-base focus:outline-none focus:ring-2 focus:ring-purple-600
                            focus:border-transparent" placeholder="Vraag..."></textarea>
            </div>
            <div style="width: 300px;">
                <button type="submit"
                        class="py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                    Stel vraag
                </button>
            </div>
        </form>

    </div>

    <div class="space-y-6 my-6" style="width: 600px">

        <div class="flex mb-5 mt-5 ml-10" style="width: 400px;">
            <div class="flex relative mr-3">
                <select name="name" id="name"
                        class="rounded-lg flex-1 appearance-none border border-amber-300 w-40 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option>Onderwerpen</option>
                </select>
            </div>
            <div class="flex relative mr-3">
                <select name="name" id="name"
                        class="rounded-lg flex-1 appearance-none border border-amber-300 w-36 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <option>Filter</option>
                </select>
            </div>
            <div class="flex relative mr-3">
                <input type="text" name="name" id="name"
                       class="rounded-l-lg flex-1 appearance-none border border-amber-300 w-36 py-2 px-4
                           bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base
                           focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
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
        <div
            class="idea-container hover:shadow-card transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>

                <div class="mt-8">
                    <button
                        class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                         class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4 class="text-xl font-semibold">
                        <a href="#" class="hover:underline"></a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum possimus quasi reprehenderit
                        earum incidunt. Ad reprehenderit repudiandae dolorem ducimus modi accusamus beatae
                        perferendis? Eum eligendi nulla aliquam numquam!
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div
                                class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">
                                Open
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end idea-container -->
    </div>
</div>
