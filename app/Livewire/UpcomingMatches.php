<?php

namespace App\Livewire;

use App\Repositories\MatchRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class UpcomingMatches extends Component
{
    public $matches;

    public function mount(MatchRepository $matchRepository)
    {
        $this->matches = $matchRepository->getUpcomingMatches();
    }

    #[On('refreshMatches')]
    public function refreshMatchList(MatchRepository $matchRepository)
    {
        $this->matches = $matchRepository->getUpcomingMatches();
    }

    public function render()
    {
        return view('livewire.upcoming-matches');
    }
}
