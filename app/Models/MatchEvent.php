<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchEvent extends Model
{
    use HasFactory;

    protected $table = 'match_events';

    protected $fillable = [
        'match_id',
        'team_id',
        'player_id',
        'assist_player_id',
        'player_in_id',
        'player_out_id',
        'event_type',
        'event_minute',
        'event_icon',
        'event_description',
        'event_detail',
    ];

    protected $with = ['team', 'player', 'assistPlayer', 'playerIn', 'playerOut'];

    protected $casts = [
        'event_minute' => 'integer',
    ];

    public function match()
    {
        return $this->belongsTo(FootballMatch::class, 'match_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function assistPlayer()
    {
        return $this->belongsTo(Player::class, 'assist_player_id');
    }

    public function playerIn()
    {
        return $this->belongsTo(Player::class, 'player_in_id');
    }

    public function playerOut()
    {
        return $this->belongsTo(Player::class, 'player_out_id');
    }

    public function getEventMinuteAttribute($value)
    {
        return $value . "'";
    }

    public function getEventIconAttribute()
    {
        switch ($this->event_type) {
            case 'goal':
                return '⚽';
            case 'yellow_card':
                return '🟨';
            case 'red_card':
                return '🟥';
            case 'substitution':
                return '🔄';
            default:
                return '';
        }
    }

    public function getEventDescriptionAttribute()
    {
        switch ($this->event_type) {
            case 'goal':
                return $this->player->name . ' ⚽';
            case 'yellow_card':
                return $this->player->name . ' 🟨';
            case 'red_card':
                return $this->player->name . ' 🟥';
            case 'substitution':
                return $this->playerOut->name . ' 🔄 ' . $this->playerIn->name;
            default:
                return '';
        }
    }

    public function getEventDetailAttribute()
    {
        switch ($this->event_type) {
            case 'goal':
                return $this->player->name;
            case 'yellow_card':
                return '<span class="text-yellow-500">' . $this->player->name . ' 🟨</span>';
            case 'red_card':
                return '<span class="text-red-500">' . $this->player->name . ' 🟥</span>';
            case 'substitution':
                return '<span class="text-gray-500">' . $this->playerOut->name . ' 🔄 ' . $this->playerIn->name . '</span>';
            default:
                return '';
        }
    }
}
