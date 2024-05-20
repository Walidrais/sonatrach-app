@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 shadow-xl rounded-xl">
                <div class="card prose-lg card-compact">
                    <div class="card-header">
                        <h2 class="mx-8 mt-6 -mb-0">Liste d'autorisations</h2>
                    </div>
                    <div class="card-body w-full">
                       
                        <div class="table-responsive">
                            <table class="w-full text-sm table-zebra text-left">
                                <thead>
                                    <tr class="bg-primary text-primary-content">
                                        <th scope="col" class="px-6 py-4 cursor-pointer">Date</th>
                                        <th scope="col" class="px-6 py-4">Chauffeurs</th>
                                        <th scope="col" class="px-6 py-4">Convoyeurs</th>
                                        <th scope="col" class="px-6 py-4">Camions</th>
                                        <th scope="col" class="px-6 py-4">Citernes</th>
                                        <th scope="col" class="px-6 py-4">Actions</th>
                                    </tr>
                                </thead>
                        
                                <tbody>
                                    @foreach($autorisations as $autorisation)
                                        <tr>
                                            <td scope="col" class=" px-6 py-4">{{ $autorisation->created_at }}</td>
                                            <td scope="col" class=" px-6 py-4">{{ $autorisation->chauffeurs->nom }}</td>
                                            <td scope="col" class=" px-6 py-4">{{ $autorisation->convoyeurs->nom }}</td>
                                            <td scope="col" class=" px-6 py-4">{{ $autorisation->camions->matricule }}</td>
                                            <td scope="col" class=" px-6 py-4">{{ $autorisation->citernes->matricule }}</td>
                                            
                                            <td scope="col" class=" px-6 py-4">
                                                <form action="{{ route('autorisation.show', $autorisation->id) }}" method="GET">
                                                    <button type="submit" class="btn btn-secondary text-secondary-content">View Details</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>                                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
