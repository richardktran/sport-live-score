<div>
    <div id="match-scores" class="row align-self-center">
        <div class="col-5 d-flex flex-column align-items-center justify-content-center align-self-center">
            <img src="{{ Vite::image($match->homeTeam->logo) }}" alt="{{ $match->homeTeam->name }}" width="100" height="100">
            <div class='d-flex flex-row'>
                <h3> {{ $match->homeTeam->name }}  &nbsp; </h3>
                <button type="button" class="btn btn-sm btn-success rounded-circle h-100" data-bs-toggle="modal" data-bs-target="#createHomeEventForm">
                    <i class="bi bi-plus"></i>
                </button>
            </div>


        </div>
        <div class="col-2 d-flex flex-column align-items-center justify-content-center align-self-center">
            <div class='d-flex flex-row'>
                <h3> &nbsp; {{ $match->home_score }} - {{ $match->away_score }} &nbsp;</h3>
            </div>
        </div>
        <div class="col-5 d-flex flex-column align-items-center justify-content-center align-self-center">
            <img src="{{ Vite::image($match->awayTeam->logo) }}" alt="{{ $match->awayTeam->name }}" width="100" height="100">
            <div class='d-flex flex-row'>
                <button type="button" class="btn btn-sm btn-success rounded-circle h-100" data-bs-toggle="modal" data-bs-target="#createAwayEventForm">
                    <i class="bi bi-plus"></i>
                </button>
                <h3>  &nbsp; {{ $match->awayTeam->name }}</h3>
            </div>
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


    @script
        <script>
            $wire.on('eventCreated' , () => {
                console.log('listen');
            });
        </script>
    @endscript

</div>
