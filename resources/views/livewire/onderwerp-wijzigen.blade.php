<div class="bg-white pt-4">

    <!-- Header Text -->
    <h1 class="font-bold text-center">
        {{ $topic['name'] }}
        <a class="text-gray-400">({{ $topic['id'] }})</a>
    </h1>

    <!-- Inputs -->
    <div class="py-6 px-6">
        <form wire:submit.prevent="submit">

            <div class="mb-3">
                <label for="on-error-email" class="text-gray-700 mb-2">
                    Naam
                </label>
                <input type="text" wire:model="name"
                       class="ring-blue-500 ring-2 rounded-lg border-transparent focus:shadow-lg transition duration-500 flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-gray-100 text-gray-600 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent"
                       placeholder="Naam"/>
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col">
                <button wire:click="submit" type="submit" class="w-full transition duration-500 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <a>Opslaan</a>
                </button>

                <button wire:click="cancel" class="w-full transition duration-500 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                    <a>Terug</a>
                </button>
            </div>
        </form>
    </div>

</div>
