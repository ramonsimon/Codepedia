<div class="flex flex-col items-center" wire:ignore>
    <div class="flex bg-white  rounded-xl items-center flex-col  ">
        <div class="flex space-x-96 mb-5 mt-5 items-center">
            <div class="text-black uppercase font-bold text-center text-xl mt-5 mb-3">
                Artikel Wijzigen
            </div>
        </div>

        <form wire:submit.prevent="submit">
            <div class="flex flex-col mb-2">
                <input type="text" wire:model="title" id="name"
                       class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                       placeholder="Naam..."/>
            </div>
            <div class="mb-2">
                {{--<select name="topic" id="topic89]01O23$%y 8--}}
                {{--    class=" rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">--}}
                {{--</select>--}}


                <select wire:model="topic_id" name="topic_id" class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    @foreach($onderwerpen as $onderwerp)
                        <option value="{{$onderwerp->id}}">{{$onderwerp->name}}</option>
                    @endforeach
                </select>
            </div>

            @error('title') <span class="error">{{ $message }}</span> @enderror
            @error('description') <span class="error">{{ $message }}</span> @enderror
            <div class="mb-2">
                <input wire:model="sub_description" type="text"  id="description"
                       class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                       placeholder="Korte omschrijving..."/>
            </div>
            <x-head.tinymce-config wire:model="description"/>
            <div class="mb-2">
                <div class="mb-2" wire:ignore>

                </div>

            </div>
            <div class="flex items-center">
                <button type="submit" wire:click="submit"
                        class="py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-4/12 transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
                    Opslaan
                </button>
            </div>
        </form>
        <div class="flex justify-center">
        </div>
    </div>
</div>



