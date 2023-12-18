<x-guest-layout>
    <div class="modal fade" id="createHomeEventForm" tabindex="-1" aria-labelledby="createHomeEventFormLabel" aria-hidden="true">
        @livewire('create-event-form', [
            'team' => $match->homeTeam,
            'match' => $match,
            'key' => 'create-event-home-modal'
        ])
    </div>

    <div class="modal fade" id="createAwayEventForm" tabindex="-1" aria-labelledby="createAwayEventFormLabel" aria-hidden="true">
        @livewire('create-event-form', [
            'team' => $match->awayTeam,
            'match' => $match,
            'key' => 'create-event-away-modal'
        ])
    </div>
    @livewire('match-events', ['match' => $match])


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Echo.channel(`match`)
            .listen('MatchEventCreated', (e) => {
                console.log('eventCreated:' + e.matchId);
                Livewire.dispatch('refreshEvent', {matchId: e.matchId});
            });

            Echo.channel(`match`)
                .listen('MatchStarted', (e) => {
                    console.log('Start match');
                    Livewire.dispatch('refreshEvent', {matchId: e.matchId});
                });

            Echo.channel(`match`)
                .listen('MatchFinished', (e) => {
                    console.log('End match');
                    Livewire.dispatch('refreshEvent', {matchId: e.matchId});
                });
        });
    </script>


</x-guest-layout>


