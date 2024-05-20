<div class="table-responsive">
    <table class="w-full text-sm table-zebra text-left">
        <thead>
            <tr class="bg-primary text-primary-content">
                <th wire:click="sortBy('date')" scope="col" class="px-6 py-4 cursor-pointer">Date</th>
                <th wire:click="sortBy('periode')" scope="col" class="px-6 py-4 cursor-pointer">Période</th>
                <th scope="col" class="px-6 py-4">Chauffeurs</th>
                <th scope="col" class="px-6 py-4">Convoyeurs</th>
                <th scope="col" class="px-6 py-4">Camions</th>
                <th scope="col" class="px-6 py-4">Citernes</th>
                <th wire:click="sortBy('etat')" scope="col" class="px-6 py-4 cursor-pointer">État: {{ $etatText }}
                </th>
                <th scope="col" class="px-6 py-4">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($demandes as $demande)
                <tr>
                    <td scope="col" class=" px-6 py-4">{{ $demande->date }}</td>
                    <td scope="col" class=" px-6 py-4">{{ $demande->periode }}</td>
                    <td scope="col" class=" px-6 py-4">{{ count($demande->chauffeurs) }}</td>
                    <td scope="col" class=" px-6 py-4">{{ count($demande->convoyeurs) }}</td>
                    <td scope="col" class=" px-6 py-4">{{ count($demande->camions) }}</td>
                    <td scope="col" class=" px-6 py-4">{{ count($demande->citernes) }}</td>
                    <td scope="col" class=" px-6 py-4">
                        @if ($demande->etat === null)
                            <p class="text-primary font-weight-bold">En Attente
                        @elseif ($demande->etat == 2)
                            <p class="text-green-600 font-weight-bold">Acceptée
                        @elseif ($demande->etat == 1)
                            <p class="text-red-600 font-weight-bold">Refusée
                        @endif
                    </td>
                    <td scope="col" class=" px-6 py-4">
                        <form action="{{ route('demandes.show', $demande->id) }}" method="GET">
                            <button type="submit" class="btn btn-secondary text-secondary-content">View Details</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
