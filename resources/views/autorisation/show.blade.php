@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Autorisation Details</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <strong>Date:</strong> {{ $autorisation->created_at }}
                            </div>
                            {{--<div class="col">
                                <strong>Période:</strong> {{ $autorisation->periode }}
                            </div>--}}
                            <div class="col">
                            <form action="{{ route('download.pdf', $autorisation->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary">Download PDF</button>
                            </form>  
                            </div>                          
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col">
                                <strong>Chauffeur:</strong>
                                <div class="list-group mt-2">
                                        <div class="list-group-item">
                                            <h5 class="mb-1">{{ $autorisation->chauffeurs->nom }}</h5>
                                            <p class="mb-1"><strong>Numéro de permis:</strong> {{ $autorisation->chauffeurs->num_id_permis }}</p>
                                            <p class="mb-1"><strong>Date d'expiration du permis:</strong> {{ $autorisation->chauffeurs->date_exp_permis }}</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <div class="col">
                                <strong>Convoyeur:</strong>
                                <div class="list-group mt-2">
                                        <div class="list-group-item">
                                            <h5 class="mb-1">{{ $autorisation->convoyeurs->nom }}</h5>
                                            <p class="mb-0"><strong>Numéro de carte d'identité:</strong> {{ $autorisation->convoyeurs->num_carte_id }}</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <strong>Camion:</strong>
                                <div class="list-group mt-2">
                                        <div class="list-group-item">
                                            <h5 class="mb-1">{{ $autorisation->camions->matricule }}</h5>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <strong>Citerne:</strong>
                                <div class="list-group mt-2">
                                        <div class="list-group-item">
                                            <h5 class="mb-1">{{ $autorisation->citernes->matricule }}</h5>
                                        </div>
                                </div>
                            </div>
                        </div>                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
