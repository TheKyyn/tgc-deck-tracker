<div>
    @if ($isOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                <h2 class="text-lg font-bold mb-4">{{ __('Add a New Deck') }}</h2>
                <form wire:submit.prevent="addDeck">
                    <div class="mb-4">
                        <label for="name"
                            class="block text-sm font-medium text-gray-700">{{ __('Deck Name') }}</label>
                        <input type="text" id="name" wire:model="name"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="image"
                            class="block text-sm font-medium text-gray-700">{{ __('Deck Image') }}</label>
                        <input type="file" id="image" wire:model="image" class="mt-1 block w-full">
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="button" wire:click="hideModal"
                            class="mr-2 bg-gray-300 px-4 py-2 rounded-md">{{ __('Cancel') }}</button>
                        <button type="submit"
                            class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600">{{ __('Add') }}</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
