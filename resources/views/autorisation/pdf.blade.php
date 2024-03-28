<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autorisation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Define styles for the PDF document */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
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
</body>
</html>