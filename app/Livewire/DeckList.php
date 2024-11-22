<?php

namespace App\Livewire;

use App\Models\Deck;
use Livewire\Component;

class DeckList extends Component
{
    public $decks = [];
    public $totalWins = 0;
    public $totalLosses = 0;
    public $totalMatches = 0;
    public $winRatio = 0;

    protected $listeners = ['deckAdded' => 'refreshDecks'];

    public function mount(): void
    {
        $this->refreshDecks();
        $this->calculateGlobalStats();
    }

    public function refreshDecks(): void
    {
        $this->decks = Deck::all();
        $this->calculateGlobalStats();
    }

    public function deleteDeck($deckId): void
    {
        $deck = Deck::findOrFail($deckId);
        $deck->delete();

        $this->refreshDecks();
    }

    public function calculateGlobalStats(): void
    {
        $this->totalWins = Deck::sum('wins');
        $this->totalLosses = Deck::sum('losses');
        $this->totalMatches = $this->totalWins + $this->totalLosses;
        $this->winRatio = $this->totalMatches > 0
            ? round(($this->totalWins / $this->totalMatches) * 100, 2)
            : 0;
    }

    public function render()
    {
        return view('livewire.deck-list')
            ->layout('components.layouts.app');
    }
}
