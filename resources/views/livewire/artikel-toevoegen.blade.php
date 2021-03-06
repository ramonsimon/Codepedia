<div class="flex flex-col items-center overflow-x-auto">
    <div class="flex bg-white ml-9 mt-5 mb-4 rounded-xl items-center flex-col overflow-auto pb-10 px-4 max-w-2xl">
        <div class="flex space-x-96 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                Artikel toevoegen
            </div>
        </div>

        <form wire:submit.prevent="submit">
            <div class="flex flex-col mb-2">
                @error('title') <span class="error">{{ $message }}</span> @enderror
                <input type="text" wire:model="title" id="name"
                       class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                       placeholder="Titel..."/>
            </div>


            <div class="mb-2">
                <select wire:model="topic_id" name="topic_id" class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    @foreach($onderwerpen as $onderwerp)
                        <option value="{{$onderwerp->id}}">{{$onderwerp->name}}</option>
                    @endforeach
                </select>
            </div>
            @error('sub_description') <span class="error">{{ $message }}</span> @enderror
            <div class="mb-2">
                <input wire:model="sub_description" type="text"  id="description"
                       class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                       placeholder="Korte omschrijving..."/>
            </div>
            <div class="mb-2">
                @error('description') <span class="error">{{ $message }}</span> @enderror
                <div class="mb-2" wire:ignore>

                </div>
                <x-head.tinymce-config wire:model="description"/>
            </div>
            <div class="flex justify-center items-center">
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



