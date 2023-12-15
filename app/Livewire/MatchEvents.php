<?php

namespace App\Livewire;

use Livewire\Component;

class MatchEvents extends Component
{
    public $match;

    public function mount($match)
    {
        $this->match = $match;
    }

    public function render()
    {
        return view('livewire.match-events');
    }
}
