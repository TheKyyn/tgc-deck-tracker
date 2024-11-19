<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Deck;

class AddDeck extends Component
{
    use WithFileUploads;

    public $name;
    public $image;

    public function addDeck()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = $this->image ? $this->image->store('decks', 'public') : null;

        Deck::create([
            'name' => $this->name,
            'image' => $imagePath,
            'wins' => 0,
            'losses' => 0,
        ]);

        $this->reset(['name', 'image']);
        $this->emit('deckAdded');
    }

    public function render()
    {
        return view('livewire.add-deck')
            ->layout('layouts.app');
    }
}
