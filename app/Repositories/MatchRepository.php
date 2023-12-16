<?php

namespace App\Repositories;

use App\Models\FootballMatch;
use App\Supports\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class MatchRepository extends BaseRepository
{
    public function model()
    {
        return FootballMatch::class;
    }

    // Create a new match
    public function createMatch(array $data): ?Model
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
