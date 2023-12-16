<?php

namespace App\Livewire;

use App\Repositories\MatchEventRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateEventForm extends Component
{
    public $key;
    public $eventType = 'substitution';

    public $match; // Match that the event is happening in

    public $team; // Team that is involved in the event (e.g. team that scored a goal)

    public $player; // Player who is involved in the event (e.g. player who scored a goal)

    public $minute; // Minute of the match when the event happened

    public $assistant; // Player who assisted the event (e.g. player who assisted a goal)

    public $eventTypes = [
        'substitution' => 'Substitution',
        'goal' => 'Goal',
        'yellow_card' => 'Yellow Card',
        'red_card' => 'Red Card',
    ];

    public function mount($match, $team)
    {
        $this->match = $match;
        $this->team = $team;
    }

    public function rules()
    {
        return [
            'eventType' => 'required',
            'team' => 'required',
            'player' => 'required',
            'minute' => 'required|numeric',
            'assistant' => Rule::requiredIf($this->eventType === 'goal'),
        ];
    }

    public function selectedEvent()
    {
        //
    }

    public function createEvent(MatchEventRepository $matchEventRepository)
    {
        $this->validate();

        try {
            $event = $matchEventRepository->createEvent([
                'match_id' => $this->match->id,
                'team_id' => $this->team->id,
                'player_id' => $this->player,
                'event_minute' => $this->minute,
                'assistant_id' => $this->assistant,
                'event_type' => $this->eventType,
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return;
        }


        if (is_null($event)) {
            session()->flash('error', 'Failed to create match');

            return;
        }

        $this->reset(['player', 'minute', 'assistant']);
        $this->dispatch('eventCreated');
    }

    public function render()
    {
        return view('livewire.create-event-form');
    }
}
