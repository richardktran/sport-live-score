<x-guest-layout>
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


