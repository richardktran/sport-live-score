<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function matches()
    {
        return $this->hasMany(FootballMatch::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
