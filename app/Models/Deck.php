<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'wins', 'losses'];

    public function matches()
    {
        return $this->hasMany(PokemonMatch::class);
    }
}
