<?php

namespace App\Livewire;

use App\Events\MatchCreated;
use App\Repositories\MatchRepository;
use App\Repositories\TeamRepository;
use Carbon\Carbon;
use Livewire\Component;

class CreateMatchForm extends Component
{
    public $homeTeam;
    public $awayTeam;
    public $matchDate;
    public $matchTime;
    public $location;
    public $homeScore = 0;
    public $awayScore = 0;
    public $referee = '';

    protected function rules()
    {
        return [
            'homeTeam' => 'required',
            'awayTeam' => 'required',
            'matchDate' => 'required',
            'matchTime' => 'required',
            'location' => 'required',
            'referee' => 'nullable|string',
        ];
    }

    public function createMatch(MatchRepository $matchRepository)
    {
        $this->validate();

        $match = $matchRepository->createMatch([
            'home_team_id' => $this->homeTeam,
            'away_team_id' => $this->awayTeam,
            'match_date' => Carbon::parse($this->matchDate . ' ' . $this->matchTime)->format('Y-m-d H:i:s'),
            'location' => $this->location,
            'home_score' => $this->homeScore,
            'away_score' => $this->awayScore,
            'referee' => $this->referee,
        ]);

        if (is_null($match)) {
            session()->flash('error', 'Failed to create match');

            return;
        }

        session()->flash('created', 'Match created successfully');
        $this->reset();
        $this->dispatch('closeCreateMatchForm');
        event(new MatchCreated());
    }

    public function render(TeamRepository $teamRepository)
    {
        $allTeams = $teamRepository->getAllTeams();

        return view('livewire.create-match-form', [
            'allTeams' => $allTeams,
        ]);
    }
}
