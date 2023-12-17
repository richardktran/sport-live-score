<?php

namespace App\Livewire;

use App\Events\MatchEventCreated;
use App\Repositories\MatchEventRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Livewire\Component;

class CreateEventForm extends Component
{
    public $key;
    public $eventType = 'goal';
    public $match; // Match that the event is happening in
    public $team; // Team that is involved in the event (e.g. team that scored a goal)
    public $player; // Player who is involved in the event (e.g. player who scored a goal)
    public $minute; // Minute of the match when the event happened
    public $assistant; // Player who assisted the event (e.g. player who assisted a goal)
    public $playerIn;
    public $playerOut;

    public $eventTypes = [
        'goal' => 'Goal',
        'substitution' => 'Substitution',
        'yellow_card' => 'Yellow Card',
        'red_card' => 'Red Card',
    ];

    public function mount($match, $team)
    {
        $this->match = $match;
        $this->team = $team;
        $this->minute = $match->current_minute;
    }

    public function rules()
    {
        return [
            'eventType' => 'required',
            'team' => 'required',
            'minute' => 'nullable|numeric',
            'player' => Rule::requiredIf($this->checkWhetherFieldIsDisplayed('player')),
            'assistant' => Rule::requiredIf($this->checkWhetherFieldIsDisplayed('assistant')),
            'playerIn' => Rule::requiredIf($this->checkWhetherFieldIsDisplayed('playerIn')),
            'playerOut' => Rule::requiredIf($this->checkWhetherFieldIsDisplayed('playerOut'))
        ];
    }

    public function selectedEvent()
    {
        //
    }

    public function eventFormConfig()
    {
        return [
            'player' => ['goal', 'yellow_card', 'red_card'],
            'assistant' => ['goal'],
            'playerIn' => ['substitution'],
            'playerOut' => ['substitution']
        ];
    }

    public function checkWhetherFieldIsDisplayed($field)
    {
        return in_array($this->eventType, $this->eventFormConfig()[$field]);
    }

    public function createEvent(MatchEventRepository $matchEventRepository)
    {
        $this->validate();

        try {
            $event = $matchEventRepository->createEvent([
                'match_id' => $this->match->id,
                'team_id' => $this->team->id,
                'player_id' => $this->player,
                'event_minute' => $this->minute ?? $this->match->current_minute,
                'assistant_id' => $this->assistant,
                'event_type' => $this->eventType,
                'player_in_id' => $this->playerIn,
                'player_out_id' => $this->playerOut
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
        $this->dispatch('closeEventModal');
        event(new MatchEventCreated($this->match->id));
    }

    public function render()
    {
        return view('livewire.create-event-form');
    }
}
