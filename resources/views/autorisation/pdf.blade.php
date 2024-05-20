<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorisation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .list-group-item {
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="flex justify-between items-center card-header">
                <div>Autorisation Details</div>

            </div>
            <div class="card-body">
                <div class="mb-4">
                    <strong class="text-lg font-bold text-gray-700">Date:</strong> {{ $autorisation->created_at }}
                </div>
                <hr class="my-4">
                <div class="mb-4">
                    <strong class="text-lg font-bold text-gray-700">Chauffeur:</strong>
                    <div class="list-group mt-2">
                        <div class="list-group-item">
                            <h5 class="mb-1">{{ $autorisation->chauffeurs->nom }}</h5>
                            <p class="mb-1"><strong>Numéro de permis:</strong> {{ $autorisation->chauffeurs->num_id_permis }}</p>
                            <p class="mb-1"><strong>Date d'expiration du permis:</strong> {{ $autorisation->chauffeurs->date_exp_permis }}</p>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="mb-4">
                    <strong class="text-lg font-bold text-gray-700">Convoyeur:</strong>
                    <div class="list-group mt-2">
                        <div class="list-group-item">
                            <h5 class="mb-1">{{ $autorisation->convoyeurs->nom }}</h5>
                            <p class="mb-0"><strong>Numéro de carte d'identité:</strong> {{ $autorisation->convoyeurs->num_carte_id }}</p>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="mb-4">
                    <strong class="text-lg font-bold text-gray-700">Camion:</strong>
                    <div class="list-group mt-2">
                        <div class="list-group-item">
                            <h5 class="mb-1">{{ $autorisation->camions->matricule }}</h5>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="mb-4">
                    <strong class="text-lg font-bold text-gray-700">Citerne:</strong>
                    <div class="list-group mt-2">
                        <div class="list-group-item">
                            <h5 class="mb-1">{{ $autorisation->citernes->matricule }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
