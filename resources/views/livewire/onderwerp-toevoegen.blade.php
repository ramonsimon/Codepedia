<div class="flex flex-col items-center overflow-x-auto" wire:ignore>
    <div class="flex bg-white ml-9 mt-5 mb-4 rounded-xl items-center flex-col overflow-auto pb-10 px-4 max-w-2xl">
        <div class="flex space-x-96 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                Onderwerp toevoegen
            </div>
        </div>

        <form wire:submit.prevent="submit">
            <div class="flex flex-col mb-2">
                <input type="text" wire:model="name" id="name"
                       class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                       placeholder="Naam..."/>
            </div>
            <div class="mb-2">
                <select name="topic" id="topic89]01O23$%y 8
                            class=" rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                </select>
            </div>
            @error('name') <span class="error">{{ $message }}</span> @enderror
            <div style="width: 300px;">
                <button type="submit"
                        class="py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                    Opslaan
                </button>
            </div>
        </form>
        <div class="flex justify-center">
        </div>
    </div>
</div>



