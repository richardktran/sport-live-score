@php
    // Format $match->match_date to "13:30 14/12"
    $matchDate = \Carbon\Carbon::parse($match->match_date)->format('H:i d/m/Y');
@endphp


<a class="card text-white bg-secondary match-card" href="{{ route('match.details', $match) }}">
    @if ($match->is_finished)
        <div class="card-header align-self-center pt-2 badge badge-primary rounded">
            <span>{{ $match->status_string }}</span>
        </div>
    @elseif ($match->is_in_play)
        <div class="card-header badge badge-danger align-self-center pt-2 rounded">
            {{ $match->status_string }}
        </div>
    @else
        <div class="card-header badge badge-warning align-self-center pt-2 rounded">
            {{ $match->status_string }}
        </div>
    @endif
    <div class="card-inner py-3">
        <div class="row justify-content-center text-center">
            <div class="col-md-4 align-self-center">
                <img src="{{ Vite::image($match->homeTeam->logo) }}" alt="Kingstar SC" width="80"
                    height="80">
                <h5 class="mt-2">{{ $match->homeTeam->name }}</h5>
            </div>
            <div class="col-md-4 align-self-center">
                <div class="row mb-2 d-flex align-items-center">
                    @if ($match->is_scheduled)
                        <h3 class="text-warning">VS</h3>
                    @else
                        <h4 class="text-success">({{ $match->home_score }} - {{ $match->away_score }})</h4>
                    @endif
                </div>
                <div class="row mb-2">
                    <h6>{{ $matchDate }}</h6>
                </div>
                <div class="row mb-2">
                    <h6>{{ $match->location }}</h6>
                </div>
            </div>
            <div class="col-md-4 align-self-center">
                <img src="{{ Vite::image($match->awayTeam->logo) }}" alt="Arambagh FA" width="80" height="80">
                <h5 class="mt-2">{{ $match->awayTeam->name }}</h5>
            </div>
        </div>
    </div>
</a>
