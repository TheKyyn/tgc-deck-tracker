<div>
    <form wire:submit.prevent="addDeck">
        <div>
            <label for="name">{{ __('Deck Name') }}</label>
            <input type="text" id="name" wire:model="name">
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="image">{{ __('Deck Image') }}</label>
            <input type="file" id="image" wire:model="image">
            @error('image')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">{{ __('Add Deck') }}</button>
    </form>
</div>
