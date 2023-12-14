<?php

namespace App\Livewire;

use App\Repositories\MatchRepository;
use Livewire\Component;
use Livewire\Attributes\On;

class UpcomingMatches extends Component
{
    public $matches;

    public function mount(MatchRepository $matchRepository)
    {
        $this->matches = $matchRepository->getUpcomingMatches();
    }

    #[On('matchCreated')]
    public function refreshMatchList(MatchRepository $matchRepository)
    {
        $this->matches = $matchRepository->getUpcomingMatches();
    }

    public function render()
    {
        return view('livewire.upcoming-matches');
    }
}
