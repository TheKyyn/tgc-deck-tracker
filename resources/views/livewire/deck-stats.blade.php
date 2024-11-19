<div class="bg-gray-50 min-h-screen p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-indigo-600">{{ $deck->name }} {{ __('Stats') }}</h1>
        <a href="{{ route('home') }}" class="bg-gray-200 text-gray-800 text-sm px-4 py-2 rounded-md hover:bg-gray-300">
            {{ __('Retour à l\'accueil') }}
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <p class="text-lg font-semibold">{{ __('Total Matches:') }} {{ $deck->wins + $deck->losses }}</p>
        <p class="text-lg text-green-500">{{ __('Wins:') }} {{ $deck->wins }}</p>
        <p class="text-lg text-red-500">{{ __('Losses:') }} {{ $deck->losses }}</p>
        <p class="text-lg">{{ __('Win Rate:') }}
            {{ $deck->wins + $deck->losses > 0 ? round(($deck->wins / ($deck->wins + $deck->losses)) * 100, 2) : 0 }}%
        </p>
        <h3 class="text-xl font-bold mt-6">{{ __('Match History') }}</h3>
        <ul class="list-disc list-inside">
            @foreach ($deck->matches as $match)
                <li class="{{ $match->result === 'win' ? 'text-green-500' : 'text-red-500' }}">
                    {{ ucfirst($match->result) }} vs {{ $match->opponent }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
