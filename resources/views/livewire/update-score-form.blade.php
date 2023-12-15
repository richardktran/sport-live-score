<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create a new match </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">



        </div>
        <div class="modal-footer">
            <button type="button" id="closeMatchModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" wire:click="createMatch">Create Match</button>
        </div>
    </div>

    {{-- @script
        <script>
            $wire.on('matchCreated', () => {
                // Close the modal
                $('#closeMatchModal').click();
            });
        </script>
    @endscript --}}
</div>
