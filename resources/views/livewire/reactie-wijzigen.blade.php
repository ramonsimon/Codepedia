<div class="flex flex-col items-center" wire:ignore>
    <div class="flex bg-white  rounded-xl items-center flex-col  ">
        <div class="flex  items-center">
            <div class="text-black uppercase font-bold text-center text-xl ">
                Reactie Wijzigen
            </div>
        </div>

        <form wire:submit.prevent="submit">

            @error('body') <span class="error">{{ $message }}</span> @enderror
            <div class="mb-2">
                <x-head.ask class="w-full" wire:model="body"/>
            </div>

            <div class="flex items-center" style="width: 300px;">
                <button type="submit" wire:click="submit"
                        class="py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                    Opslaan
                </button>
            </div>

        </form>
    </div>
</div>



