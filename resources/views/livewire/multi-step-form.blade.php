<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <form wire:submit.prevent="submitForm" class="table-responsive">
    @csrf

    {{--Step 1--}}

    @if ($currentStep == 1)
        
    
    <div class="step-one">
        <div class="card">
            <div class="card-header bg-secondary text-secondary-content py-3 px-4">Etape 1 - Demande</div>
                            <div class="card-body flex flex-col space-y-4">
                        
                                    <div class="flex flex-col">
                                        <label for="date" class="mb-1">Date</label>
                                        <input id="date" type="date" class="input input-bordered w-full max-w-xs" name="date" value="{{ old('date') }}" required wire:model="dateDemande">
                                        <span class="text-danger">@error('dateDemande'){{$message}}@enderror</span>
                                    </div>

                                    <div class="flex flex-col">
                                        <label for="periode" class="mb-1">Période</label>
                                        <input id="periode" type="text" class="input input-bordered w-full max-w-xs" name="periode" value="{{ old('periode') }}" wire:model="periodeDemande" required>
                                        <span class="text-danger">@error('periodeDemande'){{$message}}@enderror</span>
                                    </div>
                            </div>

        </div>
    </div>
    @endif


    @if ($currentStep == 2)
    {{--Step 2--}}
    <div class="step-two">
        <div class="card">
            <div class="card-header bg-secondary text-secondary-content py-3 px-4">Etape 2 - Chauffeurs</div>
        
            @foreach ($chauffeurs as $index => $chauffeur)
            <div class="card-body flex flex-col space-y-4">
                <div class="flex justify-between items-center bg-primary text-primary-content px-4 py-2 rounded-md">
                    <p class="font-semibold">Chauffeur {{$index + 1}}</p>
                    @if($index > 0)
                    <button type="button" class="btn btn-danger" wire:click.prevent="delChauffeur({{$index}})">Supprimer</button>  
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="nomChauffeur" class="mb-1">Nom du chauffeur</label>
                    <input id="nomChauffeur" type="text" class="input input-bordered w-full max-w-xs" name="chauffeurs[{{$index}}][nomChauffeur]" placeholder="Nom du chauffeur" wire:model="chauffeurs.{{$index}}.nomChauffeur" required>
                    <span class="text-danger">@error('chauffeurs.' . $index . '.nomChauffeur'){{$message}}@enderror</span>
                </div>
                <div class="flex flex-col">
                    <label for="numPermis" class="mb-1">Numéro du permis</label>
                    <input id="numPermis" type="text" class="input input-bordered w-full max-w-xs" name="chauffeurs[{{$index}}][numPermis]" placeholder="Numéro du permis" wire:model="chauffeurs.{{$index}}.numPermis" required>
                    <span class="text-danger">@error('chauffeurs.' . $index . '.numPermis'){{$message}}@enderror</span>
                </div>
                <div class="flex flex-col">
                    <label for="dateExpPermis" class="mb-1">Date d'expiration du permis</label>
                    <input id="dateExpPermis" type="date" class="input input-bordered w-full max-w-xs" name="chauffeurs[{{$index}}][dateExpPermis]" placeholder="Date d'expiration du permis" wire:model="chauffeurs.{{$index}}.dateExpPermis" required>
                    <span class="text-danger">@error('chauffeurs.' . $index . '.dateExpPermis'){{$message}}@enderror</span>
                </div>
            </div>
            @endforeach
            <button type="button" class="btn btn-secondary mx-4 my-2" wire:click.prevent="addChauffeur()">Add Chauffeur</button>
        </div>

    </div>
    @endif

    @if ($currentStep == 3)
    {{--Step 3--}}
    <div class="step-three">
        <div class="card">
            <div class="card-header bg-secondary text-secondary-content py-3 px-4">Etape 3 - Convoyeurs</div>
        
            @foreach ($convoyeurs as $index => $convoyeur)
            <div class="card-body flex flex-col space-y-4">
                <div class="flex justify-between items-center bg-white px-4 py-2 rounded-md">
                    <p class="font-semibold">Convoyeur {{$index + 1}}</p>
                    @if($index > 0)
                    <button type="button" class="btn btn-danger" wire:click.prevent="delConvoyeur({{$index}})">Supprimer</button>  
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="nomConvoyeur" class="mb-1">Nom du convoyeur</label>
                    <input id="nomConvoyeur" type="text" class="input input-bordered w-full max-w-xs" name="convoyeurs[{{$index}}][nomConvoyeur]" placeholder="Nom du convoyeur" wire:model="convoyeurs.{{$index}}.nomConvoyeur" required>
                    <span class="text-danger">@error('convoyeurs.' . $index . '.nomConvoyeur'){{$message}}@enderror</span>
                </div>
                <div class="flex flex-col">
                    <label for="numIdConvoyeur" class="mb-1">Numéro de carte d'identité</label>
                    <input id="numIdConvoyeur" type="text" class="input input-bordered w-full max-w-xs" name="convoyeurs[{{$index}}][numIdConvoyeur]" placeholder="Numéro de carte d'identité" wire:model="convoyeurs.{{$index}}.numIdConvoyeur" required>
                    <span class="text-danger">@error('convoyeurs.' . $index . '.numIdConvoyeur'){{$message}}@enderror</span>
                </div>
            </div>
            @endforeach
            <button type="button" class="btn btn-secondary mx-4 my-2" wire:click.prevent="addConvoyeur()">Add Convoyeur</button>
        </div>
        

    </div>
    @endif

    @if ($currentStep == 4)
    {{--Step 4--}}
    <div class="step-four">
        <div class="card">
            <div class="card-header bg-secondary text-secondary-content py-3 px-4">Etape 4 - Camions</div>
        
            @foreach ($camions as $index => $camion)
            <div class="card-body flex flex-col space-y-4">
                <div class="flex justify-between items-center bg-white px-4 py-2 rounded-md">
                    <p class="font-semibold">Camion {{$index + 1}}</p>
                    @if($index > 0)
                    <button type="button" class="btn btn-danger" wire:click.prevent="delCamion({{$index}})">Supprimer</button>  
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="matriculeCamion" class="mb-1">Camion</label>
                    <input id="matriculeCamion" type="text" class="input input-bordered w-full max-w-xs" name="camions[{{$index}}][matriculeCamion]" placeholder="Matricule du camion" wire:model="camions.{{$index}}.matriculeCamion" required>
                    <span class="text-danger">@error('camions.' . $index . '.matriculeCamion'){{$message}}@enderror</span>
                </div>
            </div>
            @endforeach
            <button type="button" class="btn btn-secondary mx-4 my-2" wire:click.prevent="addCamion()">Add Camion</button>
        </div>        

    </div>
    @endif

    @if ($currentStep == 5)
    {{--Step 5--}}
    <div class="step-five">
        <div class="card">
            <div class="card-header bg-secondary text-secondary-content py-3 px-4">Etape 5 - Citernes</div>
        
            @foreach ($citernes as $index => $citerne)
            <div class="card-body flex flex-col space-y-4">
                <div class="flex justify-between items-center bg-white px-4 py-2 rounded-md">
                    <p class="font-semibold">Citerne {{$index + 1}}</p>
                    @if($index > 0)
                    <button type="button" class="btn btn-danger" wire:click.prevent="delCiterne({{$index}})">Supprimer</button>  
                    @endif
                </div>
                <div class="flex flex-col">
                    <label for="matriculeCiterne" class="mb-1">Citerne</label>
                    <input id="matriculeCiterne" type="text" class="input input-bordered w-full max-w-xs" name="citernes[{{$index}}][matriculeCiterne]" placeholder="Matricule de la citerne" wire:model="citernes.{{$index}}.matriculeCiterne" required>
                    <span class="text-danger">@error('citernes.' . $index . '.matriculeCiterne'){{$message}}@enderror</span>
                </div>
            </div>
            @endforeach
            <button type="button" class="btn btn-secondary mx-4 my-2" wire:click.prevent="addCiterne()">Add Citerne</button>
        </div>        

    </div>
    @endif


    <div class="flex justify-between py-2 px-4">

        @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5 )
            <button type="button" class="btn btn-secondary mx-2" wire:click="decreaseStep()">Précédent</button>
        @endif
    
        @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4)
            <button type="button" class="btn btn-success mx-2" wire:click="increaseStep()">Suivant</button>
        @endif
            
        @if ($currentStep == 5)
            <button type="submit" class="btn btn-success mx-2">Créer la demande</button>
        @endif
    </div>    

    
    </form>
</div>
