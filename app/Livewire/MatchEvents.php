<?php

namespace App\Livewire;

use App\Models\FootballMatch;
use App\Repositories\MatchEventRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class MatchEvents extends Component
{
    public $match;
    public $events;

    public function mount(FootballMatch $match)
    {
        $this->match = $match;
        $this->events = $match->events;
    }

    #[On('eventCreated')]
    public function refreshEvents(MatchEventRepository $matchEventRepository, $matchId)
    {
        if ($matchId) {
            $this->events = $matchEventRepository->getEventsForMatch($this->match);
        }
    }

    public function startMatch()
    {
        $this->match->update([
            'status' => FootballMatch::STATUS_IN_PLAY,
            'match_date' => now()->toDateTimeString(),
        ]);

        $this->match->save();

        $this->dispatch('matchStarted');
    }

    public function endMatch()
    {
        $this->match->update([
            'status' => FootballMatch::STATUS_FINISHED,
            'match_date' => now()->toDateTimeString(),
        ]);

        $this->match->save();

        $this->dispatch('matchFinished');
    }

    public function render()
    {
        return view('livewire.match-events');
    }
}
