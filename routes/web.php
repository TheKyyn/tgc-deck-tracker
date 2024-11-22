<?php

use App\Livewire\DeckList;
use App\Livewire\DeckStats;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', DeckList::class)->name('home');
Route::get('/deck/{id}', DeckStats::class)->name('deck.stats');
