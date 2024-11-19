<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonMatch extends Model
{
    use HasFactory;

    protected $fillable = ['deck_id', 'opponent', 'result'];

    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }
}