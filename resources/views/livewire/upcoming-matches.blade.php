<div class="container mt-5 ">
    <div class="row">
        <h3>Upcoming Matches</h3>
    </div>

    @if (!is_null($matches) && count($matches) > 0)
        @foreach ($matches as $match)
            <x-match-card :match="$match" />
        @endforeach
    @else
        <div class="row">
            <div class="col-12">
                <p class="text-center">No upcoming matches</p>
            </div>
        </div>
    @endif

</div>
