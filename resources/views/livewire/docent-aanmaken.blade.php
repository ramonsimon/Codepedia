<div>
    @section('title')
        Codepedia - Docent aanmaken
    @endsection
    <div class="flex flex-col items-center overflow-x-auto">

        <div class="flex bg-white ml-9 mt-5 rounded-xl items-center flex-col overflow-auto pb-10"
             style="width: 400px;">
            <div class="flex space-x-96 mb-5 mt-5 items-center">
                <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                    Docentaccount Aanmaken
                </div>
            </div>

            <div class="flex justify-center">
                <form wire:submit.prevent="submit" method="post" action="">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                    <div class="flex-col mb-2">
                        <input wire:model="name" type="text" name="name" id="name"
                               class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                               placeholder="Naam..."/>
                    </div>
                    @error('last_name') <span class="error">{{ $message }}</span> @enderror
                    <div class="flex-col mb-2">
                        <input wire:model="last_name" type="text" name="last_name" id="last_name"
                               class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                               placeholder="Achternaam..."/>
                    </div>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                    <div wire:model="email" class="flex-col mb-2">

                        <input type="email" name="email" id="email"
                               class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                               placeholder="Email..."/>
                    </div>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                    <div wire:model="password" class="flex-col mb-2">
                        <input type="password" name="password" id="password"
                               class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                               placeholder="Wachtwoord..."/>
                    </div>
                    @error('passwordrep') <span class="error">{{ $message }}</span> @enderror
                    <div wire:model="passwordrep"class="flex-col mb-2">
                        <input type="password" name="passwordrep" id="passwordrep"
                               class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                               placeholder="Herhaal wachtwoord..."/>
                    </div>

                    <div style="width: 300px;">
                        <button type="submit"
                                class="py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                            Aanmaken
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
