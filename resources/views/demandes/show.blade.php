@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Demande Details</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <strong>Date:</strong> {{ $demande->date }}
                            </div>
                            <div class="col">
                                <strong>Période:</strong> {{ $demande->periode }}
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col">
                                <strong>Chauffeurs:</strong>
                                <div class="list-group mt-2">
                                    @foreach ($demande->chauffeurs as $chauffeur)
                                        <div class="list-group-item">
                                            <h5 class="mb-1">{{ $chauffeur->nom }}</h5>
                                            <p class="mb-1"><strong>Numéro de permis:</strong> {{ $chauffeur->num_id_permis }}</p>
                                            <p class="mb-1"><strong>Date d'expiration du permis:</strong> {{ $chauffeur->date_exp_permis }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col">
                                <strong>Convoyeurs:</strong>
                                <div class="list-group mt-2">
                                    @foreach ($demande->convoyeurs as $convoyeur)
                                        <div class="list-group-item">
                                            <h5 class="mb-1">{{ $convoyeur->nom }}</h5>
                                            <p class="mb-0"><strong>Numéro de carte d'identité:</strong> {{ $convoyeur->num_carte_id }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <strong>Camions:</strong>
                                <div class="list-group mt-2">
                                    @foreach ($demande->camions as $camion)
                                        <div class="list-group-item">
                                            <h5 class="mb-1">{{ $camion->matricule }}</h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <strong>Citernes:</strong>
                                <div class="list-group mt-2">
                                    @foreach ($demande->citernes as $citerne)
                                        <div class="list-group-item">
                                            <h5 class="mb-1">{{ $citerne->matricule }}</h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        

                        <hr>

                        <div class="row">
                            <div class="col">
                                <strong>État:</strong>
                                @if ($demande->etat === null)
                                    En Attente
                                @elseif ($demande->etat == 2)
                                    Acceptée
                                @elseif ($demande->etat == 1)
                                    Refusée
                                @endif
                            </div>
                        </div>
                        @if ($demande->etat === null)
                        <hr>

                            <div class="row">
                                <div class="col">
                                    
                                        <form action="{{ route('demandes.accept', $demande->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-success mr-2">Accepter</button>
                                        </form>
                                        <form action="{{ route('demandes.refuse', $demande->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-danger">Refuser</button>
                                        </form>
                                    
                                </div>
                            </div>
                        @endif                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
