@php
    // Format $match->match_date to "13:30 14/12"
    $matchDate = \Carbon\Carbon::parse($match->match_date)->format('H:i d/m/Y');
@endphp


<a class="card text-white bg-secondary" href="{{ route('match.details', $match) }}">
    <div class="card-header">Header</div>
    <div class="card-inner">
        <div class="row justify-content-center text-center">
            <div class="col-md-4 align-self-center">
                <img src="{{ Vite::image($match->homeTeam->logo) }}" alt="Kingstar SC" width="80"
                    height="80">
                <h5 class="mt-2">{{ $match->homeTeam->name }}</h5>
            </div>
            <div class="col-md-4 align-self-center">
                <div class="row mb-2">
                    <h4>VS ({{ $match->home_score }} - {{ $match->away_score }})</h4>
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
