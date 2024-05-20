@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow-xl rounded-xl">
                <div class="card">
                    <div class="card-header prose">
                        <h2 class="mx-8 mt-6">Demande Details</h2>
                    </div>
                    <hr class="my-4">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong class="text-lg font-weight-bold text-gray-700">Date:</strong>
                                <p class="text-gray-900 prose">{{ $demande->date }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong class="text-lg font-weight-bold text-gray-700">Période:</strong>
                                <p class="text-gray-900 prose">{{ $demande->periode }}</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mb-4">
                            <strong class="text-lg font-bold">Chauffeur:</strong>
                            @foreach ($demande->chauffeurs as $chauffeur)
                            <div class="mt-2">
                                <div class="border border-gray-300 rounded-lg p-4">
                                    <p class="text-gray-900 font-semibold">{{ $chauffeur->nom }}</p>
                                    <p class="text-gray-700"><strong>Numéro de permis:</strong> {{ $chauffeur->num_id_permis }}</p>
                                    <p class="text-gray-700"><strong>Date d'expiration du permis:</strong> {{ $chauffeur->date_exp_permis }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        

                        <hr class="my-4">

                        <div class="mb-4">
                            <strong class="text-lg font-bold text-gray-700">Convoyeurs:</strong>
                            <br>
                            @foreach ($demande->convoyeurs as $convoyeur)
                                <div class="mb-3">
                                    <div class="border border-gray-300 rounded-lg p-4">
                                        <p class="text-gray-900 font-semibold">{{ $convoyeur->nom }}</p>
                                        <p class="text-gray-700"><strong>Numéro de carte d'identité:</strong> {{ $convoyeur->num_carte_id }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        

                        <hr class="my-4">

                        <div class="mb-4">
                            <strong class="text-lg font-bold text-gray-700">Camions:</strong>
                            <br>
                            @foreach ($demande->camions as $camion)
                                <div class="mb-3">
                                    <div class="border border-gray-300 rounded-lg p-4">
                                        <p class="text-gray-900 font-semibold">{{ $camion->matricule }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        

                        <hr class="my-4">

                        <div class="mb-4">
                            <strong class="text-lg font-bold text-gray-700">Citernes:</strong>
                            <br>
                            @foreach ($demande->citernes as $citerne)
                                <div class="mb-3">
                                    <div class="border border-gray-300 rounded-lg p-4">
                                        <p class="text-gray-900 font-semibold">{{ $citerne->matricule }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        

                        <hr class="my-4">

                        <div class="mb-4">
                            <strong class="text-lg font-weight-bold text-gray-700">État:</strong>
                            @if ($demande->etat === null)
                                <p class="text-primary font-weight-bold">En Attente</p>
                            @elseif ($demande->etat == 2)
                                <p class="text-green-600 font-weight-bold">Acceptée</p>
                            @elseif ($demande->etat == 1)
                                <p class="text-red-600 font-weight-bold">Refusée</p>
                            @endif
                        </div>

                        @if (Auth::user()->role === 'chef_idc')
                            
                        @if ($demande->etat === null)
                        <hr class="my-4">

                        <div class="flex justify-end">
                            <form action="{{ route('demandes.accept', $demande->id) }}" method="post" class="mr-2">
                                @csrf
                                @method('put')
                                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Accepter</button>
                            </form>
                            <form action="{{ route('demandes.refuse', $demande->id) }}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Refuser</button>
                            </form>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
