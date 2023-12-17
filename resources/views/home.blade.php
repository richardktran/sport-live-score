<x-guest-layout>
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

            Echo.channel(`match`)
                .listen('MatchStarted', (e) => {
                    console.log('Start match');
                    Livewire.dispatch('refreshMatches');
                });

            Echo.channel(`match`)
                .listen('MatchFinished', (e) => {
                    console.log('End match');
                    Livewire.dispatch('refreshMatches');
                });
        });
    </script>
</x-guest-layout>
