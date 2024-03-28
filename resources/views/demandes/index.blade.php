@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">All Demandes</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Période</th>
                        <th>Chauffeurs</th>
                        <th>Convoyeurs</th>
                        <th>Camions</th>
                        <th>Citernes</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($demandes as $demande)
                        <tr>
                            <td>{{ $demande->date }}</td>
                            <td>{{ $demande->periode }}</td>
                            <td>
                                @foreach($demande->chauffeurs as $chauffeur)
                                    <span class="badge bg-primary">{{ $chauffeur->nom }}</span><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($demande->convoyeurs as $convoyeur)
                                    <span class="badge bg-secondary">{{ $convoyeur->nom }}</span><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($demande->camions as $camion)
                                    <span class="badge bg-success">{{ $camion->matricule }}</span><br>
                                @endforeach
                            </td>
                            <td>
                                @foreach($demande->citernes as $citerne)
                                    <span class="badge bg-warning">{{ $citerne->matricule }}</span><br>
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('demandes.show', $demande->id) }}" method="GET">
                                    <button type="submit" class="btn btn-primary">View Details</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
