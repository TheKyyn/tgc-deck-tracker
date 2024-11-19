<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Deck;

class PlayerSummary extends Component
{
    public $totalWins;
    public $totalLosses;
    public $totalMatches;
    public $winRatio;

    public function mount()
    {
        $this->calculateStats();
    }

    public function calculateStats()
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
        return view('livewire.player-summary')
            ->layout('layouts.app');
    }
}

