<div class="flex flex-col items-center p-5" wire:ignore>
    <div class="flex bg-white  rounded-xl items-center flex-col  ">
        <div class="flex  items-center">
            <div class="text-black uppercase font-bold text-center text-xl mb-2">
                Reactie Wijzigen
            </div>
        </div>

        <form wire:submit.prevent="submit">

            @error('body') <span class="error">{{ $message }}</span> @enderror
            <div class="mb-2">
                @if($this->comment_type == 'comment')
                    <x-head.ask class="w-full" wire:model="body"/>
                @else
                    <textarea wire:model="body" class="w-full h-32 p-2 border border-gray-300 rounded-lg"
                              placeholder="Reactie"></textarea>
                @endif
            </div>

            <div class="flex justify-center items-center">
                <div><button type="submit" wire:click="submit"
                             class="py-2 px-20 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                        Opslaan
                    </button></div>

            </div>

        </form>
    </div>
</div>



