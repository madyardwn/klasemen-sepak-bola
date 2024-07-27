<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_klub_id',
        'away_klub_id',
        'home_klub_score',
        'away_klub_score',
    ];

    public function homeKlub()
    {
        return $this->belongsTo(Klub::class, 'home_klub_id');
    }

    public function awayKlub()
    {
        return $this->belongsTo(Klub::class, 'away_klub_id');
    }
}
