<div class="container">
    <div class="flex justify-between">
        <div class="mr-4">
            <label for="entity" class="block mb-1">Choose Entity to Search:</label>
            <select id="entity" class="select select-bordered w-full max-w-xs" wire:model="selectedEntity">
                <option value="chauffeurs">Chauffeurs</option>
                <option value="convoyeurs">Convoyeurs</option>
                <option value="camions">Camions</option>
                <option value="citernes">Citernes</option>
            </select>
        </div>
        <div>
            <label for="search" class="block mb-1">Search:</label>
            <div class="flex">
                <input type="text" id="search" class="input input-bordered flex items-center gap-2 mr-4 form-input" wire:model.debounce.500ms="searchQuery">
                <button class="btn btn-primary" type="button" wire:click="search">Search</button>
            </div>
        </div>
    </div>

    <div class="mt-3 my-4">
        @if($selectedEntity === 'chauffeurs')
            
            <div class="space-y-4">
                <strong>Chauffeurs:</strong>
                <div class="flex flex-col space-y-4 mt-2">
                    @foreach ($chauffeurs as $chauffeur)
                    <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                        <div>
                            <h5 class="text-lg font-semibold">{{ $chauffeur->nom }}</h5>
                            <p><strong>Numéro de permis:</strong> {{ $chauffeur->num_id_permis }}</p>
                            <p><strong>Date d'expiration du permis:</strong> {{ $chauffeur->date_exp_permis }}</p>
                        </div>
                        <button type="button" class="btn btn-primary" wire:click="addToAutorisations('chauffeur', {{ $chauffeur->id }})">Ajouter</button>
                    </div>
                    @endforeach
                </div>
            </div>
            
        @elseif($selectedEntity === 'convoyeurs')
            
            <div class="space-y-4">
                <strong>Convoyeurs:</strong>
                <div class="flex flex-col space-y-4 mt-2">
                    @foreach ($convoyeurs as $convoyeur)
                    <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                        <div>
                            <h5 class="text-lg font-semibold">{{ $convoyeur->nom }}</h5>
                            <p class="mb-0"><strong>Numéro de carte d'identité:</strong> {{ $convoyeur->num_carte_id }}</p>
                        </div>
                        <button type="button" class="btn btn-primary" wire:click="addToAutorisations('convoyeur', {{ $convoyeur->id }})">Ajouter</button>
                    </div>
                    @endforeach
                </div>
            </div>
        
            
        @elseif($selectedEntity === 'camions')
            
            <div class="space-y-4">
                <strong>Camions:</strong>
                <div class="flex flex-col space-y-4 mt-2">
                    @foreach ($camions as $camion)
                    <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                        <div>
                            <h5 class="text-lg font-semibold">{{ $camion->matricule }}</h5>
                        </div>
                        <button type="button" class="btn btn-primary" wire:click="addToAutorisations('camion', {{ $camion->id }})">Ajouter</button>
                    </div>
                    @endforeach
                </div>
            </div>
        
            
        @elseif($selectedEntity === 'citernes')
            
            <div class="space-y-4">
                <strong>Citernes:</strong>
                <div class="flex flex-col space-y-4 mt-2">
                    @foreach ($citernes as $citerne)
                    <div class="border border-gray-200 rounded-lg p-4 flex items-center justify-between">
                        <div>
                            <h5 class="text-lg font-semibold">{{ $citerne->matricule }}</h5>
                        </div>
                        <button type="button" class="btn btn-primary" wire:click="addToAutorisations('citerne', {{ $citerne->id }})">Ajouter</button>
                    </div>
                    @endforeach
                </div>
            </div>
        

        @endif
    </div>

    <form wire:submit.prevent="submitForm">
        <!-- Chauffeur Field -->
        <div class="mt-4">
            <label for="chauffeur" class="text-gray-600">Chauffeur:</label>
            <input type="text" class="input input-bordered w-full max-w-xs" disabled id="chauffeur" wire:model="chauffeurName">
        </div>
    
        <!-- Convoyeur Field -->
        <div class="mt-4">
            <label for="convoyeur" class="text-gray-600">Convoyeur:</label>
            <input type="text" class="input input-bordered w-full max-w-xs" disabled id="convoyeur" wire:model="convoyeurName" readonly>
        </div>
    
        <!-- Camion Field -->
        <div class="mt-4">
            <label for="camion" class="text-gray-600">Camion:</label>
            <input type="text" class="input input-bordered w-full max-w-xs" disabled id="camion" wire:model="camionMatricule" readonly>
        </div>
    
        <!-- Citerne Field -->
        <div class="mt-4">
            <label for="citerne" class="text-gray-600">Citerne:</label>
            <input type="text" class="input input-bordered w-full max-w-xs" disabled id="citerne" wire:model="citerneMatricule" readonly>
        </div>
    
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary my-4">Submit</button>
    </form>
</div>
