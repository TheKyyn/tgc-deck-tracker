<x-filament-panels::page>
    <x-filament-panels::header>
        <x-slot name="heading">
            {{ $deck->name }} {{ __('Stats') }}
        </x-slot>

        <x-slot name="actions">
            <x-filament::button :href="route('home')" color="secondary">
                {{ __('Retour à l\'accueil') }}
            </x-filament::button>
        </x-slot>
    </x-filament-panels::header>

    <x-filament::card>
        <div class="grid grid-cols-4 gap-4">
            <x-filament::stats.card :label="__('Total Matches')" :value="$deck->wins + $deck->losses" icon="heroicon-o-collection" />
            <x-filament::stats.card :label="__('Wins')" :value="$deck->wins" icon="heroicon-o-trending-up" color="success" />
            <x-filament::stats.card :label="__('Losses')" :value="$deck->losses" icon="heroicon-o-trending-down" color="danger" />
            <x-filament::stats.card :label="__('Win Rate')" :value="($deck->wins + $deck->losses > 0
                ? round(($deck->wins / ($deck->wins + $deck->losses)) * 100, 2)
                : 0) . '%'" icon="heroicon-o-chart-pie" />
        </div>

        <div class="mt-6">
            <h3 class="text-xl font-bold mb-4">{{ __('Match History') }}</h3>
            <div class="space-y-2">
                @foreach ($deck->matches as $match)
                    <div class="flex items-center p-2 bg-gray-50 rounded-lg">
                        <x-heroicon-o-{{ $match->result === 'win' ? 'trending-up' : 'trending-down' }}
                            class="w-5 h-5 {{ $match->result === 'win' ? 'text-success-500' : 'text-danger-500' }} mr-2" />
                        {{ ucfirst($match->result) }} vs {{ $match->opponent }}
                    </div>
                @endforeach
            </div>
        </div>
    </x-filament::card>
</x-filament-panels::page>
