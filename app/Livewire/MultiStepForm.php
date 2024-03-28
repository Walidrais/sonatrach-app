<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Demande;
use App\Models\Camion;
use App\Models\Chauffeur;
use App\Models\Convoyeur;
use App\Models\Citerne;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MultiStepForm extends Component
{

    public $user;

    public function __construct()
    {
        $this->user = Auth::user()->id;
    }


    public $dateDemande;
    public $periodeDemande;

    public $nomChauffeur;
    public $numPermis;
    public $dateExpPermis;

    public $nomConvoyeur;
    public $numIdConvoyeur;

    public $matriculeCamion;

    public $matriculeCiterne;


    public $chauffeurs = [];
    public $convoyeurs = [];
    public $camions = [];
    public $citernes = [];

    public $currentStep = 1;
    public $totalSteps = 5;

    public function mount(){
        $this->currentStep = 1;

        $this->chauffeurs = [
            ['nomChauffeur' => '', 'numPermis' => '', 'dateExpPermis' => '']
        ];

        $this->convoyeurs = [
            ['nomConvoyeur' => '', 'numIdConvoyeur' => '']
        ];

        $this->camions = [
            ['matriculeCamion' => '']
        ];

        $this->citernes = [
            ['matriculeCiterne' => '']
        ];

        $this->user = Auth::user()->id;

        
    }

    public function addChauffeur(){
        
        $this->chauffeurs[] = ['nomChauffeur' => '', 'numPermis' => '', 'dateExpPermis' => ''];
    }

    public function addConvoyeur(){
        
        $this->convoyeurs[] = ['nomConvoyeur' => '', 'numIdConvoyeur' => ''];
    }

    public function addCamion(){
        
        $this->camions[] = ['matriculeCamion' => ''];
    }

    public function addCiterne(){
        
        $this->citernes[] = ['matriculeCiterne' => ''];
    }

    public function delChauffeur($index){

        unset($this->chauffeurs[$index]);
        $this->chauffeurs = array_values($this->chauffeurs);
    }

    public function delConvoyeur($index){

        unset($this->convoyeurs[$index]);
        $this->convoyeurs = array_values($this->convoyeurs);
    }

    public function delCamion($index){

        unset($this->camions[$index]);
        $this->camions = array_values($this->camions);
    }

    public function delCiterne($index){

        unset($this->citernes[$index]);
        $this->citernes = array_values($this->citernes);
    }

    public function render()
    {
        return view('livewire.multi-step-form')->with('currentStep', $this->currentStep);
    }

    public function increaseStep(){
        
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;

        if($this->currentStep > $this->totalSteps){
            $this->currentStep = $this->totalSteps;
            $this->submitForm();
        }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;

        if($this->currentStep < 1){
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {   
        if($this->currentStep==1){
            $this->validate([
                'dateDemande' => ['required', 'date'],
                'periodeDemande' => ['required', 'string'],
            ]);
        }

        if ($this->currentStep == 2) {
            $rules = [];
            foreach ($this->chauffeurs as $key => $value) {
                $rules["chauffeurs.{$key}.nomChauffeur"] = ['required', 'string'];
                $rules["chauffeurs.{$key}.numPermis"] = ['required', 'string'];
                $rules["chauffeurs.{$key}.dateExpPermis"] = ['required', 'date'];
            }
        
            $this->validate($rules);
            
        }

        if ($this->currentStep == 3) {
            $rules = [];
            foreach ($this->convoyeurs as $key => $value) {
                $rules["convoyeurs.{$key}.nomConvoyeur"] = ['required', 'string'];
                $rules["convoyeurs.{$key}.numIdConvoyeur"] = ['required', 'string'];
            }
        
            $this->validate($rules);
            
        }


        if ($this->currentStep == 4) {
            $rules = [];
            foreach ($this->camions as $key => $value) {
                $rules["camions.{$key}.matriculeCamion"] = ['required', 'string'];
            }
        
            $this->validate($rules);
            
        }
    }

    public function submitForm()
    {
        
        $this->resetErrorBag();

        if ($this->currentStep == 5) {
            $rules = [];
            foreach ($this->citernes as $key => $value) {
                $rules["citernes.{$key}.matriculeCiterne"] = ['required', 'string'];
            }
        
            $this->validate($rules);
        }

        
        $citernesSubmitted = count(array_filter($this->citernes, function($citerne) {
            return !empty($citerne['matriculeCiterne']);
        })) > 0;
        
        if($citernesSubmitted){
            $values = [
                'demandes' => [
                    [
                        'date' => $this->dateDemande,
                        'periode' => $this->periodeDemande,
                    ]
                ],
                'chauffeurs' => collect($this->chauffeurs)->map(function($chauffeur) {
                    return [
                        'nom' => $chauffeur['nomChauffeur'],
                        'num_id_permis' => $chauffeur['numPermis'],
                        'date_exp_permis' => $chauffeur['dateExpPermis'],
                    ];
                })->toArray(),

                'convoyeurs' => collect($this->convoyeurs)->map(function($convoyeurs) {
                    return [
                        'nom' => $convoyeurs['nomConvoyeur'],
                        'num_carte_id' => $convoyeurs['numIdConvoyeur'],
                    ];
                })->toArray(),

                'camions' => collect($this->camions)->map(function($camions) {
                    return [
                        'matricule' => $camions['matriculeCamion'],
                    ];
                })->toArray(),

                'citernes' => collect($this->citernes)->map(function($citernes) {
                    return [
                        'matricule' => $citernes['matriculeCiterne'],
                    ];
                })->toArray(),
            ];
            
        }


//        DB::beginTransaction();
  //      try {

        // Iterate through each demande in the $values['demandes'] array
        foreach ($values['demandes'] as $demandeData) {
            // Create a new Demande instance for each demande data
            $demande = Demande::create([
                'date' => $demandeData['date'],
                'periode' => $demandeData['periode'],
                'chef_complex' => $this->user,
            ]);

            // You can perform any additional operations related to this demande here
        }



        // Créer et attacher des enregistrements liés pour chaque chauffeur, camion, citerne, convoyeur
        foreach ($values['chauffeurs'] as $key => $chauffeurData) {
            // Create a new Chauffeur instance for each chauffeur data
            $chauffeur = Chauffeur::create([
                'nom' => $chauffeurData['nom'],
                'num_id_permis' => $chauffeurData['num_id_permis'],
                'date_exp_permis' => $chauffeurData['date_exp_permis'],
                // Add other required fields here...
            ]);
        
            // Attach the newly created chauffeur to the demande
            $demande->chauffeurs()->attach($chauffeur->id);
        }


        foreach ($values['convoyeurs'] as $key => $convoyeurData) {
            // Create a new Convoyeur instance for each convoyeur data
            $convoyeur = Convoyeur::create([
                'nom' => $convoyeurData['nom'],
                'num_carte_id' => $convoyeurData['num_carte_id'],
                // Add other required fields here...
            ]);
        
            // Attach the newly created chauffeur to the demande
            $demande->convoyeurs()->attach($convoyeur->id);
        }


        foreach ($values['camions'] as $key => $camionData) {
            // Create a new Convoyeur instance for each convoyeur data
            $camion = Camion::create([
                'matricule' => $camionData['matricule'],
                // Add other required fields here...
            ]);
        
            // Attach the newly created chauffeur to the demande
            $demande->camions()->attach($camion->id);
        }
        
        

        foreach ($values['citernes'] as $key => $citerneData) {
            // Create a new Citerne instance for each citerne data
            $citerne = Citerne::create([
                'matricule' => $citerneData['matricule'],
                // Add other required fields here...
            ]);
        
            // Attach the newly created citerne to the demande
            $demande->citernes()->attach($citerne->id);
        }
        

        //DB::commit();

            // Optionally, return a success response or redirect
 //           return response()->json(['message' => 'Transaction completed successfully']);
   //     } catch (\Exception $e) {
            // If any operation fails, roll back the transaction
     //       DB::rollBack();

            // Optionally, log the error
       //     logger()->error($e->getMessage());

            // Return a failure response or redirect back with an error message
         //   return response()->json(['error' => 'Transaction failed'], 500);
        //}
        





    }

}
