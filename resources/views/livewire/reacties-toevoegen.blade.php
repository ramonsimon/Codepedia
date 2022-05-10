<form wire:submit.prevent="addComment"class="flex flex-row h-12 mt-3">
    <div class="flex mb-2 w-96 mr-3">
        <textarea wire:model="comment" type="text" name="name" id="name"
                  class="rounded-lg flex-1 appearance-none border border-amber-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                  placeholder="Naam..."></textarea>
    </div>
    <div style="width: 300px;">

        <button type="submit"
                class="w-36 py-2 px-4 bg-amber-500 hover:bg-amber-600 focus:ring-amber-400 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring rounded-lg">
            Reageer
        </button>
    </div>
</form>
