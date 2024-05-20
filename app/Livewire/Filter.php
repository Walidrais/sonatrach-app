<?php

namespace App\Livewire;
use App\Models\Demande;
use Livewire\Component;

class Filter extends Component
{
    public $demandes;
    public $sortByField;
    public $sortDirection = 'asc';
    public $etat = null;
    public $etatText = 'En Attente';

    public function mount()
    {
        $this->sortByField = 'etat'; // Default sorting field
        $this->loadDemandes();
    }

    public function loadDemandes()
    {
        if ($this->sortByField === 'etat') {
            $this->demandes = Demande::where('etat', $this->etat)->get();
        } else {
        $this->demandes = Demande::orderBy($this->sortByField, $this->sortDirection)->get();
        }
    }

    public function sortBy($field)
    {
        if ($field === 'etat') {
            switch ($this->etat) {
                case 0:
                    $this->etat = 1;
                    $this->etatText = 'Refusée';
                    break;
                case 1:
                    $this->etat = 2;
                    $this->etatText = 'Acceptée';
                    break;
                default:
                    $this->etat = null;
                    $this->etatText = 'En Attente'; // Reset to 0 if 'all' or any other value is set
                    break;
            }
                        
            
        } else {

                    if ($field === $this->sortByField) {
                        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
                    } else {
                        $this->sortByField = $field;
                        $this->sortDirection = 'asc'; // Reset sort direction to ascending if sorting by a new field
                    }
                }

        $this->loadDemandes();
    }

    public function render()
    {
        return view('livewire.filter', ['etatText' => $this->etatText]);

    }
}