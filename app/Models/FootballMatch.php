<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    use HasFactory;

    public const STATUS_SCHEDULED = 'scheduled';
    public const STATUS_IN_PLAY = 'in-play';
    public const STATUS_FINISHED = 'finished';


    protected $table = 'matches';

    protected $fillable = [
        'home_team_id',
        'away_team_id',
        'status',
        'location',
        'match_date',
    ];

    protected $with = ['homeTeam', 'awayTeam', 'events'];

    protected $casts = [
        'match_date' => 'datetime',
    ];

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }

    public function events()
    {
        return $this->hasMany(MatchEvent::class, 'match_id')->orderBy('event_minute');
    }

    public function getHomeScoreAttribute()
    {
        return $this->events
            ->where('team_id', $this->home_team_id)
            ->where('event_type', '==', 'goal')
            ->count();
    }

    public function getAwayScoreAttribute()
    {
        return $this->events
            ->where('team_id', $this->away_team_id)
            ->where('event_type', '==', 'goal')
            ->count();
    }

    public function getStatusStringAttribute()
    {
        switch ($this->status) {
            case self::STATUS_SCHEDULED:
                return 'Upcoming';
            case self::STATUS_IN_PLAY:
                return 'Happening';
            case self::STATUS_FINISHED:
                return 'Finished';
            default:
                return 'Unknown';
        }
    }

    public function getIsFinishedAttribute(): bool
    {
        return $this->status === self::STATUS_FINISHED;
    }

    public function getIsInPlayAttribute(): bool
    {
        return $this->status === self::STATUS_IN_PLAY;
    }

    public function getIsScheduledAttribute(): bool
    {
        return $this->status === self::STATUS_SCHEDULED;
    }

    public function getCurrentMinuteAttribute(): int
    {
        if ($this->status !== self::STATUS_IN_PLAY) {
            return 0;
        }

        $matchDate = $this->match_date;
        $now = now();

        $diff = $matchDate->diffInMinutes($now);

        return $diff;
    }
}
