<div>
    <div class="space-y-6">
        <div class="grid grid-cols-4 gap-4">
            <div class="filament-stats-card rounded-lg bg-white shadow">
                <div class="p-6">
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-rectangle-stack class="w-6 h-6 text-gray-500" />
                        <span class="text-sm font-medium text-gray-500">{{ __('Total Matches') }}</span>
                    </div>
                    <div class="text-3xl font-semibold mt-3">{{ $totalMatches }}</div>
                </div>
            </div>

            <div class="filament-stats-card rounded-lg bg-white shadow">
                <div class="p-6">
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-arrow-trending-up class="w-6 h-6 text-success-500" />
                        <span class="text-sm font-medium text-gray-500">{{ __('Total Wins') }}</span>
                    </div>
                    <div class="text-3xl font-semibold mt-3 text-success-500">{{ $totalWins }}</div>
                </div>
            </div>

            <div class="filament-stats-card rounded-lg bg-white shadow">
                <div class="p-6">
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-arrow-trending-down class="w-6 h-6 text-danger-500" />
                        <span class="text-sm font-medium text-gray-500">{{ __('Total Losses') }}</span>
                    </div>
                    <div class="text-3xl font-semibold mt-3 text-danger-500">{{ $totalLosses }}</div>
                </div>
            </div>

            <div class="filament-stats-card rounded-lg bg-white shadow">
                <div class="p-6">
                    <div class="flex items-center gap-2">
                        <x-heroicon-o-chart-pie class="w-6 h-6 text-primary-500" />
                        <span class="text-sm font-medium text-gray-500">{{ __('Win Ratio') }}</span>
                    </div>
                    <div class="text-3xl font-semibold mt-3">{{ $winRatio }}%</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            @foreach ($decks as $deck)
                <div class="filament-card rounded-lg bg-white shadow">
                    <div class="aspect-video relative">
                        <img class="w-full h-full object-cover rounded-t-lg"
                            src="{{ $deck->image ? asset('storage/' . $deck->image) : asset('images/default-deck.jpg') }}"
                            alt="{{ $deck->name }}">
                    </div>

                    <div class="p-6">
                        <h3 class="text-lg font-medium">{{ $deck->name }}</h3>

                        <div class="mt-4 grid grid-cols-3 gap-4">
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-500">{{ __('Matches') }}</div>
                                <div class="mt-1 text-lg font-semibold">{{ $deck->wins + $deck->losses }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-500">{{ __('Wins') }}</div>
                                <div class="mt-1 text-lg font-semibold text-success-500">{{ $deck->wins }}</div>
                            </div>
                            <div class="text-center">
                                <div class="text-sm font-medium text-gray-500">{{ __('Losses') }}</div>
                                <div class="mt-1 text-lg font-semibold text-danger-500">{{ $deck->losses }}</div>
                            </div>
                        </div>

                        <div class="mt-6 flex justify-between">
                            <a href="{{ route('deck.stats', $deck->id) }}"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                {{ __('View Stats') }}
                            </a>

                            <button wire:click="deleteDeck({{ $deck->id }})"
                                class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg text-white bg-danger-600 hover:bg-danger-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-danger-500">
                                {{ __('Delete') }}
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="filament-card rounded-lg bg-white shadow cursor-pointer hover:bg-gray-50"
                wire:click="$emit('openAddDeckModal')">
                <div class="flex items-center justify-center h-full p-6">
                    <div class="text-center">
                        <x-heroicon-o-plus-circle class="w-12 h-12 text-primary-500 mx-auto" />
                        <span class="mt-2 block text-sm font-medium text-gray-600">
                            {{ __('Add New Deck') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
