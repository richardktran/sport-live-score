<x-guest-layout>
    <div class="row">
        <div class="col-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMatchModal">
                Create a new match
            </button>

            <!-- Modal -->
            <div class="modal fade" id="createMatchModal" tabindex="-1" aria-labelledby="createMatchModalLabel" aria-hidden="true">
                @livewire('create-match-form')
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            @livewire('upcoming-matches')
        </div>
    </div>
</x-guest-layout>
