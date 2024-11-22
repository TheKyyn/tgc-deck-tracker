<x-filament::modal>
    <x-slot name="trigger">
        <x-filament::button wire:click="$emit('openAddDeckModal')">
            {{ __('Add a New Deck') }}
        </x-filament::button>
    </x-slot>

    <x-filament::card>
        <form wire:submit.prevent="addDeck">
            <x-filament::form>
                <x-filament::form.field-group>
                    <x-filament::form.field wire:model="name" label="{{ __('Deck Name') }}" required />

                    <x-filament::form.field wire:model="image" type="file" label="{{ __('Deck Image') }}" />
                </x-filament::form.field-group>

                <x-slot name="footer">
                    <div class="flex justify-end gap-x-3">
                        <x-filament::button wire:click="hideModal" color="secondary">
                            {{ __('Cancel') }}
                        </x-filament::button>

                        <x-filament::button type="submit" color="primary">
                            {{ __('Add') }}
                        </x-filament::button>
                    </div>
                </x-slot>
            </x-filament::form>
        </form>
    </x-filament::card>
</x-filament::modal>
