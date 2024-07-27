<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klub extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'matches_played',
        'wins',
        'draws',
        'losses',
        'goals_for',
        'goals_against',
        'points',
    ];

    public function homePertandinganes()
    {
        return $this->hasMany(Pertandingan::class, 'home_klub_id');
    }

    public function awayPertandinganes()
    {
        return $this->hasMany(Pertandingan::class, 'away_klub_id');
    }
}
