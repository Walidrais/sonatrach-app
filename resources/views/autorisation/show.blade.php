@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-4 bg-primary-500 text-black text-lg font-bold">Autorisation Details</div>

                <div class="p-4">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <strong>Date:</strong> {{ $autorisation->created_at }}
                        </div>
                        <div>
                            <form action="{{ route('download.pdf', $autorisation->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary">Download PDF</button>
                            </form>  
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="mb-4">
                        <strong>Chauffeur:</strong>
                        <div class="mt-2">
                            <div class="bg-white border border-gray-300 rounded-lg p-4">
                                <h5 class="text-xl font-semibold mb-2">{{ $autorisation->chauffeurs->nom }}</h5>
                                <p class="mb-1"><strong>Numéro de permis:</strong> {{ $autorisation->chauffeurs->num_id_permis }}</p>
                                <p class="mb-0"><strong>Date d'expiration du permis:</strong> {{ $autorisation->chauffeurs->date_exp_permis }}</p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="mb-4">
                        <strong>Convoyeur:</strong>
                        <div class="mt-2">
                            <div class="bg-white border border-gray-300 rounded-lg p-4">
                                <h5 class="text-xl font-semibold mb-2">{{ $autorisation->convoyeurs->nom }}</h5>
                                <p class="mb-0"><strong>Numéro de carte d'identité:</strong> {{ $autorisation->convoyeurs->num_carte_id }}</p>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="mb-4">
                        <strong>Camion:</strong>
                        <div class="mt-2">
                            <div class="bg-white border border-gray-300 rounded-lg p-4">
                                <h5 class="text-xl font-semibold mb-2">{{ $autorisation->camions->matricule }}</h5>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div>
                        <strong>Citerne:</strong>
                        <div class="mt-2">
                            <div class="bg-white border border-gray-300 rounded-lg p-4">
                                <h5 class="text-xl font-semibold mb-2">{{ $autorisation->citernes->matricule }}</h5>
                            </div>
                        </div>
                    </div>                 
                </div>
            </div>
        </div>
    </div>
@endsection
