<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <form wire:submit.prevent="submitForm">
    @csrf

    {{--Step 1--}}

    @if ($currentStep == 1)
        
    
    <div class="step-one">
        <div class="card">
            <div class="card-header bg-secondary text-white">Etape 1 - Demande</div>
                            <div class="card-body">
                        
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input id="date" type="date" class="form-control" name="date" value="{{ old('date') }}" required wire:model="dateDemande">
                                        <span class="text-danger">@error('dateDemande'){{$message}}@enderror</span>
                                    </div>

                                    <div class="form-group">
                                        <label for="periode">Période</label>
                                        <input id="periode" type="text" class="form-control" name="periode" value="{{ old('periode') }}" wire:model="periodeDemande" required>
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
            <div class="card-header bg-secondary text-white">Etape 2 - Chauffeurs</div>
                            
                    @foreach ($chauffeurs as $index => $chauffeur)
                            <div class="card-body">

                                            <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
                                                <p><b>Chauffeur {{$index + 1}}</b></p>
                                                @if($index>0)
                                                <button type="button" class="btn btn-danger mx-2" wire:click.prevent="delChauffeur({{$index}})">Supprimer</button>  
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Nom du chauffeur</label>
                                                <input id="nom" type="text" class="form-control" name="chauffeurs[{{$index}}][nomChauffeur]" placeholder="Nom du chauffeur" wire:model="chauffeurs.{{$index}}.nomChauffeur" required>
                                                <span class="text-danger">@error('chauffeurs.' . $index . '.nomChauffeur'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Numéro du permis</label>
                                                <input id="num_id_permis" type="text" class="form-control" name="chauffeurs[{{$index}}][numPermis]" placeholder="Numéro du permis" wire:model="chauffeurs.{{$index}}.numPermis" required>
                                                <span class="text-danger">@error('chauffeurs.' . $index . '.numPermis'){{$message}}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Date d'expiration du permis</label>
                                                <input id="date_exp_permis" type="date" class="form-control" name="chauffeurs[{{$index}}][dateExpPermis]" placeholder="Date d'expiration du permis" wire:model="chauffeurs.{{$index}}.dateExpPermis" required>
                                                <span class="text-danger">@error('chauffeurs.' . $index . '.dateExpPermis'){{$message}}@enderror</span>
                                            </div>
                            </div>
                    @endforeach
                    <button type="button" class="btn btn-secondary mx-2" wire:click.prevent="addChauffeur()">Add Chauffeur</button>

        </div>

    </div>
    @endif

    @if ($currentStep == 3)
    {{--Step 3--}}
    <div class="step-three">
        <div class="card">
            <div class="card-header bg-secondary text-white">Etape 3 - Convoyeurs</div>

                        @foreach ($convoyeurs as $index => $convoyeur)
                            <div class="card-body">

                                <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
                                    <p><b>Convoyeur {{$index + 1}}</b></p>
                                    @if($index>0)
                                    <button type="button" class="btn btn-danger mx-2" wire:click.prevent="delConvoyeur({{$index}})">Supprimer</button>  
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Nom du convoyeur</label>
                                    <input id="nom" type="text" class="form-control" name="convoyeurs[{{$index}}][nomConvoyeur]" placeholder="Nom du convoyeur" wire:model="convoyeurs.{{$index}}.nomConvoyeur" required>
                                    <span class="text-danger">@error('convoyeurs.' . $index . '.nomConvoyeur'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Numéro de carte d'identité</label>
                                    <input id="num_carte_id" type="text" class="form-control" name="convoyeurs[{{$index}}][numIdConvoyeur]" placeholder="Numéro de carte d'identité" wire:model="convoyeurs.{{$index}}.numIdConvoyeur" required>
                                    <span class="text-danger">@error('convoyeurs.' . $index . '.numIdConvoyeur'){{$message}}@enderror</span>
                                </div>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-secondary mx-2" wire:click.prevent="addConvoyeur()">Add Convoyeur</button>
        </div>

    </div>
    @endif

    @if ($currentStep == 4)
    {{--Step 4--}}
    <div class="step-four">
        <div class="card">
            <div class="card-header bg-secondary text-white">Etape 4 - Camions</div>
                       @foreach ($camions as $index => $camion)
                            <div class="card-body">

                                <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
                                    <p><b>Camion {{$index + 1}}</b></p>
                                    @if($index>0)
                                    <button type="button" class="btn btn-danger mx-2" wire:click.prevent="delCamion({{$index}})">Supprimer</button>  
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Camion</label>
                                    <input id="matricule" type="text" class="form-control" name="camions[{{$index}}][matriculeCamion]" placeholder="Matricule du camion" wire:model="camions.{{$index}}.matriculeCamion" required>
                                    <span class="text-danger">@error('camions.' . $index . '.matriculeCamion'){{$message}}@enderror</span>
                                </div>
                            </div>

                        @endforeach
                        <button type="button" class="btn btn-secondary mx-2" wire:click.prevent="addCamion()">Add Camion</button>
        </div>

    </div>
    @endif

    @if ($currentStep == 5)
    {{--Step 5--}}
    <div class="step-five">
        <div class="card">
            <div class="card-header bg-secondary text-white">Etape 5 - Citernes</div>
                        @foreach ($citernes as $index => $citerne)
                            <div class="card-body">

                                <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">
                                    <p><b>Citerne {{$index + 1}}</b></p>
                                    @if($index>0)
                                    <button type="button" class="btn btn-danger mx-2" wire:click.prevent="delCiterne({{$index}})">Supprimer</button>  
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Citerne</label>
                                    <input id="matricule" type="text" class="form-control" name="citernes[{{$index}}][matriculeCiterne]" placeholder="Matricule de la citerne" wire:model="citernes.{{$index}}.matriculeCiterne" required>
                                    <span class="text-danger">@error('citernes.' . $index . '.matriculeCiterne'){{$message}}@enderror</span>
                                </div>
                            </div>
                        @endforeach
                        <button type="button" class="btn btn-secondary mx-2" wire:click.prevent="addCiterne()">Add Citerne</button>
        </div>

    </div>
    @endif


    <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

    
        @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5 )
            <button type="button" class="btn btn-secondary mx-2" wire:click="decreaseStep()">Précédent</button>
        @endif

        @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4)
            <button type="button" class="btn btn-success mx-2" wire:click="increaseStep()">Suivant</button>
        @endif
        
        @if ($currentStep == 5)
            <button type="submit" class="btn btn-primary mx-2">Créer la demande</button>
        @endif
    </div>

    
    </form>
</div>
