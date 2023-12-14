<?php

namespace App\Repositories;

use App\Models\Team;
use App\Supports\Repositories\BaseRepository;

class TeamRepository extends BaseRepository
{
    public function model()
    {
        return Team::class;
    }

    public function getAllTeams()
    {
        return $this->model->all();
    }
}
