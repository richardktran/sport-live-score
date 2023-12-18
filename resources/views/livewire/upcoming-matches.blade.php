<div class="container mt-5 ">
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Upcoming Matches</h3>
            </div><!-- .nk-block-head-content -->
            <div class="nk-block-head-content">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMatchModal">
                    Create a new match
                </button>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
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
