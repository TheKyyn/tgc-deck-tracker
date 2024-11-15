<div>
    <h1>{{ __('Pokémon Deck Tracker') }}</h1>
    <div>
        @foreach ($decks as $deck)
        <div>
            <h3>{{ $deck->name }}</h3>
            <p>{{ __('Wins:') }}' {{ $deck->wins }}</p>
            <p>{{ __('Losses:') }} {{ $deck->losses }}</p>
            <p>{{ __('Total Matches:') }}' {{ $deck->wins + $deck->losses }}</p>
            <p>{{ __('Win Rate:') }}' {{ $deck->wins + $deck->losses > 0 ? round(($deck->wins / ($deck->wins + $deck->losses)) * 100, 2) : 0 }}%</p>
            <h4>{{ __('Match History:') }}</h4>
            <ul>
                @foreach ($deck->matches as $match)
                <li>{{ ucfirst($match->result) }} vs {{ $match->opponent }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>

    <div>
        <h2>{{ __('Add Match') }}</h2>
        <select wire:model="selectedDeck">
            <option value="">{{ __('Select Deck') }}</option>
            @foreach ($decks as $deck)
            <option value="{{ $deck->id }}">{{ $deck->name }}</option>
            @endforeach
        </select>
        <input type="text" wire:model="opponent" placeholder="Opponent Name">
        <select wire:model="result">
            <option value="">{{ __('Select Result') }}</option>
            <option value="win">{{ __('Win') }}</option>
            <option value="loss">{{ __('Loss') }}</option>
        </select>
        <button wire:click="recordMatch">{{ __('Add Match') }}</button>
    </div>
</div>
