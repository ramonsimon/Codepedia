    <div class="flex flex-col items-center overflow-x-auto">

        <div class="flex bg-white ml-9 mt-5 rounded-xl items-center flex-col overflow-auto pb-10"
             style="width: 1000px;">

            <div class="flex mb-5 mt-5 items-center">
                <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3 mr-56">
                    Onderwerpen
                </div>

                <div class="flex mb-5 mt-5 mr-5">
                    <select name="topic" id="topic"
                            class=" rounded-lg flex-1 appearance-none border border-amber-300 w-48 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                        <option>Filter</option>
                    </select>
                </div>

                <!-- Alleen voor docenten -->
                <div class="flex mb-5 mt-5">
                    <a href="atrikel-toevoegen">
                        <button type="button" class="py-2 px-4  bg-amber-500 hover:bg-amber-700 text-white w-full transition ease-in duration-200 text-center text-base font-semibold focus:outline-none rounded-lg ">
                            Artikel toevoegen
                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>
