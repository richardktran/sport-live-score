<x-guest-layout>
    <div id="match-scores" class="row align-self-center">
        <div class="col-5 d-flex flex-column align-items-center justify-content-center align-self-center">
            <img src="{{ Vite::image($match->homeTeam->logo) }}" alt="Arambagh FA" width="100" height="100">
            <h3>{{ $match->homeTeam->name }}</h3>
        </div>
        <div class="col-2 d-flex flex-column align-items-center justify-content-center align-self-center">
            <h3>{{ $match->home_score }} - {{ $match->away_score }}</h3>
        </div>
        <div class="col-5 d-flex flex-column align-items-center justify-content-center align-self-center">
            <img src="{{ Vite::image($match->awayTeam->logo) }}" alt="Arambagh FA" width="100" height="100">
            <h3>{{ $match->awayTeam->name }}</h3>
        </div>
    </div>
    @livewire('match-events', ['match' => $match])
</x-guest-layout>
