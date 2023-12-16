<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="{{ $key }}.exampleModalLabel">Create Event form </h1>
            <button type="button"  id="{{ $key }}closeCreateEventModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if (session()->has('error'))
                <div class="alert alert-warning">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="eventType">Select event: </label>
                        <select class="form-control" wire:change='selectedEvent' wire:model="eventType" id="{{ $key }}.eventType">
                            <option disabled>Select event</option>
                            @foreach ($eventTypes as $key => $event)
                            <option value="{{ $key }}">{{ $event }}</option>
                            @endforeach
                        </select>
                        @error('eventType') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="player">Scorer: </label>
                        <select class="form-control" wire:model="player" id="{{ $key }}.player">
                            <option value="">Select scorer: </option>
                            @foreach($team->players as $player)
                                <option value="{{ $player->id }}">{{ $player->name }}</option>
                            @endforeach
                        </select>
                        @error('player') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="assistant">Assistant: </label>
                        <select class="form-control" wire:model="assistant" id="{{ $key }}.assistant">
                            <option value="">Select assistant: </option>
                            @foreach($team->players as $player)
                                <option value="{{ $player->id }}">{{ $player->name }}</option>
                            @endforeach

                        </select>
                        @error('assistant') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="form-group mt-3">
                        <label for="minute">Minute: </label>
                        <input type="number" class="form-control" wire:model="minute" id="{{ $key }}.minute">
                        @error('minute') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" wire:click="createEvent">Create Event</button>
        </div>
    </div>

    @script
        <script>
            $wire.on('eventCreated', () => {
                // Close the modal
                $key = $wire.get('key');
                $('#'+$key+'closeCreateEventModal').click();
            });
        </script>
    @endscript
</div>
