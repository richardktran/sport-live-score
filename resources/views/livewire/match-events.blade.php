<div>
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

</div>
