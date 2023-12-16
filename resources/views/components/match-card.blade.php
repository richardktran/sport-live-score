@php
    // Format $match->match_date to "13:30 14/12"
    $matchDate = \Carbon\Carbon::parse($match->match_date)->format('H:i d/m/Y');
@endphp

<a href="{{ route('match.details', $match) }}">
    <div class="row justify-content-center my-4 py-2 text-center border rounded shadow">
        <div class="col-md-4 align-self-center">
            <img src="{{ Vite::image($match->homeTeam->logo) }}" alt="Kingstar SC" width="100"
                height="100">
            <h3>{{ $match->homeTeam->name }}</h3>
        </div>
        <div class="col-md-4 align-self-center">
            <div class="row">
                <h2>VS</h2>
            </div>
            <div class="row">
                <h4>{{ $matchDate }}</h4>
            </div>
            <div class="row">
                <h4>{{ $match->location }}</h4>
            </div>
        </div>
        <div class="col-md-4 align-self-center">
            <img src="{{ Vite::image($match->awayTeam->logo) }}" alt="Arambagh FA" width="100" height="100">
            <h3>{{ $match->awayTeam->name }}</h3>
        </div>
    </div>
</a>
