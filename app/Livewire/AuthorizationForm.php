<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Demande;
use App\Models\Camion;
use App\Models\Chauffeur;
use App\Models\Citerne;
use App\Models\Convoyeur;

class AuthorizationForm extends Component
{
    public $chauffeurQuery = '';
    public $convoyeurQuery = '';
    public $citerneQuery = '';
    public $camionQuery = '';

    public $chauffeurResults = [];
    public $convoyeurResults = [];
    public $citerneResults = [];
    public $camionResults = [];

    public function updatedChauffeurQuery()
    {
        $this->chauffeurResults = Chauffeur::where('nom', 'like', '%' . $this->chauffeurQuery . '%')->get();
    }

    public function updatedConvoyeurQuery()
    {
        $this->convoyeurResults = Convoyeur::where('nom', 'like', '%' . $this->convoyeurQuery . '%')->get();
    }

    public function updatedCiterneQuery()
    {
        $this->citerneResults = Citerne::where('matricule', 'like', '%' . $this->citerneQuery . '%')->get();
    }

    public function updatedCamionQuery()
    {
        $this->camionResults = Camion::where('matricule', 'like', '%' . $this->camionQuery . '%')->get();
    }

    public function selectChauffeur($chauffeurId)
    {
        // Fetch and display the selected chauffeur details
        $selectedChauffeur = Chauffeur::findOrFail($chauffeurId);
        // You can store the selected chauffeur ID in the authorization table here
    }

    public function selectConvoyeur($convoyeurId)
    {
        // Fetch and display the selected convoyeur details
        $selectedConvoyeur = Convoyeur::findOrFail($convoyeurId);
        // You can store the selected convoyeur ID in the authorization table here
    }

    public function selectCiterne($citerneId)
    {
        // Fetch and display the selected citerne details
        $selectedCiterne = Citerne::findOrFail($citerneId);
        // You can store the selected citerne ID in the authorization table here
    }

    public function selectCamion($camionId)
    {
        // Fetch and display the selected camion details
        $selectedCamion = Camion::findOrFail($camionId);
        // You can store the selected camion ID in the authorization table here
    }

    public function render()
    {
        return view('livewire.authorization-form');
    }
}
