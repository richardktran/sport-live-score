<x-guest-layout>
    @livewire('match-events', ['match' => $match])


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Echo.channel(`match`)
            .listen('MatchEventCreated', (e) => {
                console.log('eventCreated:' + e.matchId);
                Livewire.dispatch('eventCreated', {matchId: e.matchId});
            });
        });
    </script>


</x-guest-layout>


