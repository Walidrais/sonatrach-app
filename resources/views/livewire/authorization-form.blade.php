<div>
    <!-- Search input for chauffeurs -->
    <div>
        <label for="searchChauffeurs">Search Chauffeurs:</label>
        <input type="text" id="searchChauffeurs" wire:model.debounce.500ms="searchQueryChauffeurs">
    </div>

    <!-- Display search results for chauffeurs -->
    <ul>
        @foreach ($searchResultsChauffeurs as $chauffeur)
            <li>
                <button wire:click="selectChauffeur({{ $chauffeur->id }})">
                    {{ $chauffeur->nom }}
                </button>
                <!-- Display other chauffeur details as needed -->
            </li>
        @endforeach
    </ul>

    <!-- Search input for convoyeurs -->
    <div>
        <label for="searchConvoyeurs">Search Convoyeurs:</label>
        <input type="text" id="searchConvoyeurs" wire:model.debounce.500ms="searchQueryConvoyeurs">
    </div>

    <!-- Display search results for convoyeurs -->
    <ul>
        @foreach ($searchResultsConvoyeurs as $convoyeur)
            <li>
                <button wire:click="selectConvoyeur({{ $convoyeur->id }})">
                    {{ $convoyeur->nom }}
                </button>
                <!-- Display other convoyeur details as needed -->
            </li>
        @endforeach
    </ul>

    <!-- Repeat similar structure for camions and citernes -->
</div>