<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pokemon extends Model
{
    protected $table = 'pokemons';
    protected $fillable = [
        'name',
        'base_experience',
        'weight',
        'image_path'
    ];

    public function abilities()
    {
        return $this->belongsToMany(ability::class,'pokemon_abilities');
    }
}
