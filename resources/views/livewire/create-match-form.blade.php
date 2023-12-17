<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create a new match </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- @if (session()->has('created'))
            <div class="row">
                <div class="alert alert-success" role="alert">
                    {{ session('created') }}
                </div>
            </div>
            @endif --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="homeTeam">Home Team:</label>
                        <select class="form-control" wire:model="homeTeam" id="homeTeam">
                            <option value="">Select Home Team</option>
                            @foreach($allTeams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                        @error('homeTeam') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="awayTeam">Away Team:</label>
                        <select class="form-control" wire:model="awayTeam" id="awayTeam">
                            <option value="">Select Away Team</option>
                            @foreach($allTeams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                        @error('awayTeam') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6 form-group">
                    <label for="matchDate">Match Date:</label>
                    <input type="date" class="form-control" wire:model="matchDate" id="matchDate">
                    @error('matchDate') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 form-group">
                    <label for="matchTime">Match Time:</label>
                    <input type="time" class="form-control" wire:model="matchTime" id="matchTime">
                    @error('matchTime') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group mt-3">
                <label for="location">Location:</label>
                <input type="text" class="form-control" wire:model="location" id="location">
                @error('location') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="referee">Referee:</label>
                <input type="text" class="form-control" wire:model="referee" id="referee">
                @error('referee') <span class="text-danger">{{ $message }}</span> @enderror
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" id="closeMatchModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" wire:click="createMatch">Create Match</button>
        </div>
    </div>

    @script
        <script>
            $wire.on('closeCreateMatchForm', () => {
                // Close the modal
                $('#closeMatchModal').click();
            });
        </script>
    @endscript
</div>
