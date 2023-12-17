<div>
    <div id="match-scores" class="row align-self-center mb-5">
        <div class="col-5 d-flex flex-column align-items-center justify-content-center align-self-center">
            <img src="{{ Vite::image($match->homeTeam->logo) }}" alt="{{ $match->homeTeam->name }}" width="100" height="100">
            <div class='d-flex flex-row mt-2'>
                <h5> {{ $match->homeTeam->name }}  &nbsp; </h5>

            </div>
            <button class="btn btn-icon btn-primary rounded-circle mt-1" data-bs-toggle="modal" data-bs-target="#createHomeEventForm">
                <em class="icon ni ni-plus"></em>
            </button>
        </div>
        <div class="col-2 d-flex flex-column align-items-center justify-content-center align-self-center">
            <div class='d-flex flex-column align-items-center'>
                <h3> &nbsp; {{ $match->home_score }} - {{ $match->away_score }} &nbsp;</h3>
                @if ($match->status !== 'finished')
                    <span class="mb-2" wire:poll> &nbsp; ({{ $match->current_minute }}') &nbsp;</span>
                @endif
                @if ($match->status == 'scheduled')
                    <button type="button" class="btn btn-success" wire:click='startMatch'>
                        Start now
                    </button>
                @elseif ($match->status == 'in-play')
                    <button type="button" class="btn btn-success" wire:click='endMatch'>
                        End now
                    </button>
                @else
                    <div class="text-danger">
                        (Ended)
                    </div>
                @endif

            </div>
        </div>
        <div class="col-5 d-flex flex-column align-items-center justify-content-center align-self-center">
            <img src="{{ Vite::image($match->awayTeam->logo) }}" alt="{{ $match->awayTeam->name }}" width="100" height="100">
            <div class='d-flex flex-row mt-2'>

                <h5>  &nbsp; {{ $match->awayTeam->name }}</h5>
            </div>
            <button class="btn btn-icon btn-primary rounded-circle mt-1" data-bs-toggle="modal" data-bs-target="#createAwayEventForm">
                <em class="icon ni ni-plus"></em>
            </button>
        </div>
    </div>

    @foreach ($match->events as $event)
        <div class="row align-self-center">
            <div class="col-5 d-flex justify-content-center align-self-center">
                @if ($match->homeTeam->id == $event->team_id)
                    <p>{{ $event->event_description }}</p>
                @endif
            </div>
            <div class="col-2 d-flex justify-content-center align-self-center">
                <h5>{{ $event->event_icon }} {{ $event->event_minute}}</h5>
            </div>
            <div class="col-5 d-flex justify-content-center align-self-center">
                @if ($match->awayTeam->id == $event->team_id)
                    <p>{{ $event->event_description }}</p>
                @endif
            </div>
        </div>

        <hr/>
    @endforeach

    <div class="modal fade" id="createHomeEventForm" tabindex="-1" aria-labelledby="createHomeEventFormLabel" aria-hidden="true">
        @livewire('create-event-form', [
            'team' => $match->homeTeam,
            'match' => $match,
            'key' => 'create-event-home-modal'
        ])
    </div>

    <div class="modal fade" id="createAwayEventForm" tabindex="-1" aria-labelledby="createAwayEventFormLabel" aria-hidden="true">
        @livewire('create-event-form', [
            'team' => $match->awayTeam,
            'match' => $match,
            'key' => 'create-event-away-modal'
        ])
    </div>

</div>
