<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Demande;
use App\Models\Camion;
use App\Models\Chauffeur;
use App\Models\Citerne;
use App\Models\Convoyeur;
use App\Models\Autorisation;
use Illuminate\Support\Facades\Auth;

class SearchAutorisation extends Component
{

    public $user;

    public function __construct()
    {
        $this->user = Auth::user()->id;
    }

    public $searchQuery = '';
    public $chauffeurs = [];
    public $convoyeurs = [];
    public $camions = [];
    public $citernes = [];
    public $autorisations = [
        'chauffeur' => '',
        'convoyeur' => '',
        'camion' => '',
        'citerne' => '',
    ];

    public $chauffeurName;
    public $convoyeurName;
    public $camionMatricule;
    public $citerneMatricule;


    public $selectedEntity = 'chauffeurs'; // Default to chauffeurs initially

    public function render()
    {

        return view('livewire.search-autorisation');
    }

    public function search(){
        switch ($this->selectedEntity) {
            case 'chauffeurs':
                $this->chauffeurs = Chauffeur::whereHas('demandes', function($query) {
                                                        $query->where('etat', 2);
                                                    })
                                                  ->where('nom', 'like', '%' . $this->searchQuery . '%')
                                                  ->orWhere('num_id_permis', 'like', '%' . $this->searchQuery . '%')
                                                  ->get();
                break;
            case 'convoyeurs':
                $this->convoyeurs = Convoyeur::whereHas('demandes', function($query) {
                                                        $query->where('etat', 2);
                                                    })
                                                  ->where('nom', 'like', '%' . $this->searchQuery . '%')
                                                  ->orWhere('num_carte_id', 'like', '%' . $this->searchQuery . '%')
                                                  ->get();
                break;
            case 'camions':
                $this->camions = Camion::whereHas('demandes', function($query) {
                        $query->where('etat', 2);
                    })
                    ->where('matricule', 'like', '%' . $this->searchQuery . '%')->get();
                break;
            case 'citernes':
                $this->citernes = Citerne::whereHas('demandes', function($query) {
                    $query->where('etat', 2);
                })
                ->where('matricule', 'like', '%' . $this->searchQuery . '%')->get();
                break;
        }
    }

    public function addToAutorisations($entity, $id)
    {
        if ($entity === 'chauffeur') {
            $this->autorisations['chauffeur'] = $id;
            $chauffeur = Chauffeur::find($this->autorisations['chauffeur']);
            $this->chauffeurName = $chauffeur->nom;

        } elseif ($entity === 'convoyeur') {
            $this->autorisations['convoyeur'] = $id;
            $convoyeur = Convoyeur::find($this->autorisations['convoyeur']);
            $this->convoyeurName = $convoyeur->nom;

        } elseif ($entity === 'camion') {
            $this->autorisations['camion'] = $id;
            $camion = Camion::find($this->autorisations['camion']);
            $this->camionMatricule = $camion->matricule;

        } elseif ($entity === 'citerne') {
            $this->autorisations['citerne'] = $id;
            $citerne = Citerne::find($this->autorisations['citerne']);
            $this->citerneMatricule = $citerne->matricule;
        }
    }

    public function submitForm()
    {
        $autorisation = Autorisation::create([
            'chauffeur' => $this->autorisations['chauffeur'],
            'convoyeur' => $this->autorisations['convoyeur'],
            'camion' => $this->autorisations['camion'],
            'citerne' => $this->autorisations['citerne'],
            'agent' => $this->user,
            // Other autorisations fields
        ]);

        $this->reset(['autorisations', 'chauffeurName', 'convoyeurName', 'camionMatricule', 'citerneMatricule']);

        return redirect()->route('autorisation.show', $autorisation->id);
    }
}
