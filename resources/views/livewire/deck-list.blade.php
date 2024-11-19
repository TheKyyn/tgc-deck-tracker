<div class="bg-gray-100 min-h-screen p-8">
    <h1 class="text-3xl font-bold mb-6 text-center text-indigo-600">{{ __('Pokémon Deck Tracker') }}</h1>

    @livewire('add-deck-modal')

    @if ($decks->isEmpty())
        <div class="flex items-center justify-center h-96">
            <button
                class="bg-indigo-500 text-white text-xl font-bold px-6 py-3 rounded-lg hover:bg-indigo-600 transition"
                wire:click="$emit('openAddDeckModal')">
                {{ __('Add a Deck') }}
            </button>
        </div>
    @else
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <h2 class="text-xl font-bold">{{ __('Player Summary') }}</h2>
            <p>{{ __('Total Wins:') }} {{ $totalWins }}</p>
            <p>{{ __('Total Losses:') }} {{ $totalLosses }}</p>
            <p>{{ __('Total Matches:') }} {{ $totalMatches }}</p>
            <p>{{ __('Win Ratio:') }} {{ $winRatio }}%</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($decks as $deck)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover"
                        src="{{ $deck->image ? asset('storage/' . $deck->image) : 'default-image-url' }}"
                        alt="{{ $deck->name }}">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold">{{ $deck->name }}</h2>
                        <p class="text-sm text-gray-600">{{ __('Matches:') }} {{ $deck->wins + $deck->losses }}</p>
                        <p class="text-sm text-green-500">{{ __('Wins:') }} {{ $deck->wins }}</p>
                        <p class="text-sm text-red-500">{{ __('Losses:') }} {{ $deck->losses }}</p>
                        <div class="flex justify-between mt-4">
                            <a href="{{ route('deck.stats', $deck->id) }}"
                                class="bg-indigo-500 text-white text-sm px-4 py-2 rounded-md hover:bg-indigo-600">
                                {{ __('View Stats') }}
                            </a>
                            <button wire:click="deleteDeck({{ $deck->id }})"
                                class="bg-red-500 text-white text-sm px-4 py-2 rounded-md hover:bg-red-600">
                                {{ __('Delete') }}
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="bg-white shadow-md rounded-lg flex items-center justify-center">
                <button class="text-indigo-500 text-5xl font-bold hover:text-indigo-600 transition"
                    wire:click="$emit('openAddDeckModal')">
                    +
                </button>
            </div>
        </div>
    @endif
</div>
