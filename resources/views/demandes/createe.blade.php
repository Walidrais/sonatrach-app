@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            

            <h1>Créer une nouvelle demande</h1><hr>
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
                                                                <input id="date" type="date" class="form-control" name="dateDemande" value="{{ old('date') }}" required wire:model="dateDemande">
                                                                <span class="text-danger">@error('dateDemande'){{$message}}@enderror</span>
                                                            </div>
                        
                                                            <div class="form-group">
                                                                <label for="periode">Période</label>
                                                                <input id="periode" type="text" class="form-control" name="periodeDemande" value="{{ old('periode') }}" wire:model="periodeDemande" required>
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
                                                    <div class="card-body">
                                                        
                                                                    <div class="form-group">
                                                                        <label>Nom du chauffeur</label>
                                                                        <input id="nom" type="text" class="form-control" name="nomChauffeur" placeholder="Nom du chauffeur" value="{{ old('nom') }}" wire:model="nomChauffeur" required>
                                                                        <span class="text-danger">@error('nomChauffeur'){{$message}}@enderror</span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Numéro du permis</label>
                                                                        <input id="num_id_permis" type="text" class="form-control" name="numPermis" placeholder="Numéro du permis" value="{{ old('num_id_permis') }}" wire:model="numPermis" required>
                                                                        <span class="text-danger">@error('numPermis'){{$message}}@enderror</span>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Date d'expiration du permis</label>
                                                                        <input id="date_exp_permis" type="date" class="form-control" name="dateExpPermis" placeholder="Date d'expiration du permis" value="{{ old('date_exp_permis') }}" wire:model="dateExpPermis" required>
                                                                        <span class="text-danger">@error('dateExpPermis'){{$message}}@enderror</span>
                                                                    </div>
                                                    </div>
                                </div>
                        
                            </div>
                            @endif
                        
                            @if ($currentStep == 3)
                            {{--Step 3--}}
                            <div class="step-three">
                                <div class="card">
                                    <div class="card-header bg-secondary text-white">Etape 3 - Convoyeurs</div>
                                                    <div class="card-body">
                        
                                                        <div class="form-group">
                                                            <label>Nom du convoyeur</label>
                                                            <input id="nom" type="text" class="form-control" name="nomConvoyeur" placeholder="Nom du convoyeur" value="{{ old('nom') }}" wire:model="nomConvoyeur" required>
                                                            <span class="text-danger">@error('nomConvoyeur'){{$message}}@enderror</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Numéro de carte d'identité</label>
                                                            <input id="num_carte_id" type="text" class="form-control" name="numIdConvoyeur" placeholder="Numéro de carte d'identité" value="{{ old('num_carte_id') }}" wire:model="numIdConvoyeur" required>
                                                            <span class="text-danger">@error('numIdConvoyeur'){{$message}}@enderror</span>
                                                        </div>
                                                    </div>
                                </div>
                        
                            </div>
                            @endif
                        
                            @if ($currentStep == 4)
                            {{--Step 4--}}
                            <div class="step-four">
                                <div class="card">
                                    <div class="card-header bg-secondary text-white">Etape 4 - Camions</div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Camion</label>
                                                            <input id="matricule" type="text" class="form-control" name="matriculeCamion" placeholder="Matricule du camion" value="{{ old('matricule') }}" wire:model="matriculeCamion" required>
                                                            <span class="text-danger">@error('matriculeCamion'){{$message}}@enderror</span>
                                                        </div>
                                                    </div>
                                </div>
                        
                            </div>
                            @endif
                        
                            @if ($currentStep == 5)
                            {{--Step 5--}}
                            <div class="step-five">
                                <div class="card">
                                    <div class="card-header bg-secondary text-white">Etape 5 - Citernes</div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Citerne</label>
                                                            <input id="matricule" type="text" class="form-control" name="matriculeCiterne" placeholder="Matricule de la citerne" value="{{ old('matricule') }}" wire:model="matriculeCiterne" required>
                                                            <span class="text-danger">@error('matriculeCiterne'){{$message}}@enderror</span>
                                                        </div>
                                                    </div>
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
                    
        </div>
    </div>
@endsection