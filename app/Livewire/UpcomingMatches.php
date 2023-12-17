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

        $this->matches = $this->sortMatchesByStatus($this->matches);
    }

    #[On('refreshMatches')]
    public function refreshMatchList(MatchRepository $matchRepository)
    {
        $this->matches = $this->sortMatchesByStatus($matchRepository->getUpcomingMatches());
    }

    public function sortMatchesByStatus($matches)
    {
        $scheduledMatches = $matches->filter(function ($match) {
            return $match->status === 'scheduled';
        });

        $inPlayMatches = $matches->filter(function ($match) {
            return $match->status === 'in-play';
        });

        $finishedMatches = $matches->filter(function ($match) {
            return $match->status === 'finished';
        });

        // Revert the order of the finished matches
        $finishedMatches = $finishedMatches->reverse();

        return $inPlayMatches->merge($scheduledMatches)->merge($finishedMatches);
    }

    public function render()
    {
        return view('livewire.upcoming-matches');
    }
}
