<?php

namespace App\Http\Livewire;

use App\Models\Deck;
use Livewire\Component;
use App\Models\PokemonMatch;

class DeckStats extends Component
{
    public $decks;
    public $selectedDeck;
    public $opponent;
    public $result;

    public function mount()
    {
        $this->decks = Deck::with('matches')->get();
    }

    public function recordMatch()
    {
        $match = PokemonMatch::create([
            'deck_id' => $this->selectedDeck,
            'opponent' => $this->opponent,
            'result' => $this->result,
        ]);

        $deck = Deck::find($this->selectedDeck);
        if ($this->result === 'win') {
            $deck->wins += 1;
        } else {
            $deck->losses += 1;
        }
        $deck->save();

        $this->mount();
    }

    public function render()
    {
        return view('livewire.deck-stats', ['decks' => $this->decks]);
    }
}
