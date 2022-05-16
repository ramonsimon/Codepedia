<div class="flex flex-col items-center pb-3 mb-8" wire:ignore>
    <div class="flex bg-white  rounded-xl items-center flex-col  ">
        <div class="flex space-x-96 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                Reactie Wijzigen
            </div>
        </div>

        <form wire:submit.prevent="submit">

            @error('body') <span class="error">{{ $message }}</span> @enderror
            <div class="mb-2">
                <input wire:model="body" type="text"
                       class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                       placeholder="Reactie"/>
            </div>

            <div style="width: 300px;">
                <button type="submit" wire:click="submit"
                        class="py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                    Opslaan
                </button>
            </div>
        </form>
    </div>
</div>



