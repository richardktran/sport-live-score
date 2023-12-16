<?php

namespace App\Repositories;

use App\Models\FootballMatch;
use App\Models\MatchEvent;
use App\Supports\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class MatchEventRepository extends BaseRepository
{
    public function model()
    {
        return MatchEvent::class;
    }

    public function getEventsForMatch(FootballMatch $match)
    {
        try {
            return $this->model
                ->where('match_id', $match->id)
                ->orderBy('minute', 'asc')
                ->get();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return null;
        }
    }

    // Create a new match
    public function createEvent(array $data): ?Model
    {
        try {
            return $this->model->create($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return null;
        }
    }

    public function getUpcomingMatches()
    {
        try {
            return $this->model
                ->with(['homeTeam', 'awayTeam'])
                ->where('status', FootballMatch::STATUS_SCHEDULED)
                ->orderBy('match_date', 'asc')
                ->get();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return null;
        }
    }
}
