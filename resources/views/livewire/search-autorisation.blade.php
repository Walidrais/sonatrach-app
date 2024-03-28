<div class="container">
    <div class="row">
        <div class="col-md-4">
            <label for="entity">Choose Entity to Search:</label>
            <select id="entity" class="form-control" wire:model="selectedEntity">
                <option value="chauffeurs">Chauffeurs</option>
                <option value="convoyeurs">Convoyeurs</option>
                <option value="camions">Camions</option>
                <option value="citernes">Citernes</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="search">Search:</label>
            <div class="input-group">
                <input type="text" id="search" class="form-control" wire:model.debounce.500ms="searchQuery">
                <button class="btn btn-primary" type="button" wire:click="search">Search</button>
            </div>
        </div>
    </div> 

    <ul class="list-group mt-3">
        @if($selectedEntity === 'chauffeurs')
            
            <div class="row">
                <div class="col">
                    <strong>Chauffeurs:</strong>
                    <div class="list-group mt-2">
                        @foreach ($chauffeurs as $chauffeur)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">{{ $chauffeur->nom }}</h5>
                                <p class="mb-1"><strong>Numéro de permis:</strong> {{ $chauffeur->num_id_permis }}</p>
                                <p class="mb-1"><strong>Date d'expiration du permis:</strong> {{ $chauffeur->date_exp_permis }}</p>
                            </div>
                            <button type="button" class="btn btn-primary" wire:click="addToAutorisations('chauffeur', {{ $chauffeur->id }})">Ajouter</button>
                        </div>                        
                        @endforeach
                    </div>
                </div>
            </div>
            
        @elseif($selectedEntity === 'convoyeurs')
            
            <div class="row">
                <div class="col">
                    <strong>Convoyeurs:</strong>
                    <div class="list-group mt-2">
                        @foreach ($convoyeurs as $convoyeur)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                <h5 class="mb-1">{{ $convoyeur->nom }}</h5>
                                <p class="mb-0"><strong>Numéro de carte d'identité:</strong> {{ $convoyeur->num_carte_id }}</p>
                                </div>
                                <button type="button" class="btn btn-primary" wire:click="addToAutorisations('convoyeur', {{ $convoyeur->id }})">Ajouter</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        @elseif($selectedEntity === 'camions')
            
            <div class="row">
                <div class="col">
                    <strong>Camions:</strong>
                    <div class="list-group mt-2">
                        @foreach ($camions as $camion)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-1">{{ $camion->matricule }}</h5>
                            </div>
                            <button type="button" class="btn btn-primary" wire:click="addToAutorisations('camion', {{ $camion->id }})">Ajouter</button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        @elseif($selectedEntity === 'citernes')
            
            <div class="row">
                <div class="col">
                    <strong>Citernes:</strong>
                    <div class="list-group mt-2">
                        @foreach ($citernes as $citerne)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                <h5 class="mb-1">{{ $citerne->matricule }}</h5>
                                </div>
                                <button type="button" class="btn btn-primary" wire:click="addToAutorisations('citerne', {{ $citerne->id }})">Ajouter</button>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>

        @endif
    </ul>

    <form wire:submit.prevent="submitForm">
        <!-- Chauffeur Field -->
        <div class="form-group">
            <label for="chauffeur">Chauffeur:</label>
            <input type="text" class="form-control" id="chauffeur" wire:model="chauffeurName" readonly>
        </div>
    
        <!-- Convoyeur Field -->
        <div class="form-group">
            <label for="convoyeur">Convoyeur:</label>
            <input type="text" class="form-control" id="convoyeur" wire:model="convoyeurName" readonly>
        </div>
    
        <!-- Camion Field -->
        <div class="form-group">
            <label for="camion">Camion:</label>
            <input type="text" class="form-control" id="camion" wire:model="camionMatricule" readonly>
        </div>
    
        <!-- Citerne Field -->
        <div class="form-group">
            <label for="citerne">Citerne:</label>
            <input type="text" class="form-control" id="citerne" wire:model="citerneMatricule" readonly>
        </div>
    
        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
