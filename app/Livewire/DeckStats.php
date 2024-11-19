<?php

namespace App\Livewire;

use App\Models\Deck;
use App\Models\PokemonMatch;
use Livewire\Component;

class DeckStats extends Component
{
    public $decks;
    public $selectedDeck;
    public $opponentDeck;
    public $result;
    public $deckId;
    public $deck;

    public $availableDecks = [
        'Pikachu',
        'Charizard',
        'Bulbasaur',
        'Squirtle',
        'Mewtwo',
        'Eevee',
        'Gengar',
        'Snorlax',
    ];

    public function mount($id)
    {
        $this->deckId = $id;
        $this->deck = Deck::with('matches')->findOrFail($id);
    }

    public function recordMatch()
    {
        $this->validate([
            'selectedDeck' => 'required|in:' . implode(',', $this->availableDecks),
            'opponentDeck' => 'required|in:' . implode(',', $this->availableDecks),
            'result' => 'required|in:win,loss',
        ]);

        $deck = Deck::firstOrCreate(['name' => $this->selectedDeck], ['wins' => 0, 'losses' => 0]);

        PokemonMatch::create([
            'deck_id' => $deck->id,
            'opponent' => $this->opponentDeck,
            'result' => $this->result,
        ]);

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
        return view('livewire.deck-stats', ['deck' => $this->deck])
            ->layout('layouts.app');
    }
}
