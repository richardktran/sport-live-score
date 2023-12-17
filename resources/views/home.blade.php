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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Echo.channel(`match`)
            .listen('MatchCreated', (e) => {
                Livewire.dispatch('refreshMatches');
            });

            Echo.channel(`match`)
            .listen('MatchEventCreated', (e) => {
                console.log('Event created');
                Livewire.dispatch('refreshMatches');
            });
        });
    </script>
</x-guest-layout>
