<x-guest-layout>
    <div id="match-scores" class="row align-self-center">
        <div class="col-5 d-flex justify-content-center align-self-center">
            <h3>{{ $match->homeTeam->name }}</h3>
        </div>
        <div class="col-2 d-flex justify-content-center align-self-center">
            <h3>{{ $match->home_score }} - {{ $match->away_score }}</h3>
        </div>
        <div class="col-5 d-flex justify-content-center align-self-center">
            <h3>{{ $match->homeTeam->name }}</h3>
        </div>
    </div>
    <div class="row align-self-center">
        <div class="col-5 d-flex justify-content-center align-self-center">
            <p>Viktor Vasin (3')</p>
        </div>
        <div class="col-2 d-flex justify-content-center align-self-center">
            <p><span class="badge bg-primary"> 🎉 Goal (1-0)</span></p>
        </div>
        <div class="col-5 d-flex justify-content-center align-self-center">

        </div>
    </div>
    <div class="row align-self-center">
        <div class="col-5 d-flex justify-content-center align-self-center">

        </div>
        <div class="col-2 d-flex justify-content-center align-self-center">
            <p><span class="badge bg-primary"> 🎉 Goal (1 - 1)</span></p>
        </div>
        <div class="col-5 d-flex justify-content-center align-self-center">
            <p>Viktor Vasin (6')</p>
        </div>
    </div>
    <div class="row align-self-center">
        <div class="col-5 d-flex justify-content-center align-self-center">

        </div>
        <div class="col-2 d-flex justify-content-center align-self-center">
            <p>  🟨 </p>
        </div>
        <div class="col-5 d-flex justify-content-center align-self-center">
            <p>Khoa Tran (6')</p>
        </div>
    </div>
</x-guest-layout>
