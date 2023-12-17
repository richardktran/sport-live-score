<?php

namespace App\Livewire;

use App\Events\MatchFinished;
use App\Events\MatchStarted;
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

    #[On('refreshEvent')]
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

        event(new MatchStarted($this->match->id));
    }

    public function endMatch()
    {
        $this->match->update([
            'status' => FootballMatch::STATUS_FINISHED,
            'match_date' => now()->toDateTimeString(),
        ]);

        $this->match->save();

        event(new MatchFinished($this->match->id));
    }

    public function render()
    {
        return view('livewire.match-events');
    }
}
