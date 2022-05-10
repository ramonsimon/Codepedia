 <div class="flex flex-col items-center overflow-x-auto">

        <div class="flex bg-white ml-9 mt-5 rounded-xl items-center flex-col overflow-auto pb-10"
             style="width: 400px;">
            <div class="flex space-x-96 mb-5 mt-5 items-center">
                <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                    Gegevens Bewerken
                </div>
            </div>

            <div class="flex justify-center">
                <form wire:submit.prevent="submit" method="post" action="">
                    <div class="flex-col mb-2">
                        <input wire:model="name" type="text" name="name" id="name"
                               class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                               placeholder="Naam..." value="{{$user->name}}"/>
                    </div>
                    <div class="flex-col mb-2">
                        <input wire:model="email" type="email" name="email" id="email"
                               class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                               placeholder="Email..." value="{{$user->email}}"/>
                    </div>
                    <div wire:model="password" class="flex-col mb-2">
                        <input type="password" name="password" id="password"
                               class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                               placeholder="Wachtwoord..."`/>
                    </div>
                    <div style="width: 300px;">
                        <button type="submit"
                                class="py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                            Opslaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
