<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Models\Camion;
use App\Models\Chauffeur;
use App\Models\Citerne;
use App\Models\Convoyeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demandes = Demande::with(['chauffeurs', 'convoyeurs', 'camions', 'citernes'])->get();
        return view('demandes.index', compact('demandes')); // Pass demandes data to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('demandes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données de la requête entrantes
        $validatedData = $request->all();
        dd($validatedData);

        // Commencer une transaction de base de données
        DB::beginTransaction();

        try {
            
            // Créer un nouvel enregistrement demande
            $demande = Demande::create([
                'date' => $validatedData['date'],
                'periode' => $validatedData['periode'],
                // Ajouter d'autres champs de la table demande
            ]);

            // Créer et attacher des enregistrements liés pour chaque chauffeur, camion, citerne, convoyeur
            foreach ($validatedData['chauffeurs'] as $chauffeurData) {
                $chauffeur = Chauffeur::create($chauffeurData);
                $demande->chauffeurs()->attach($chauffeur->id);
            }

            foreach ($validatedData['camions'] as $camionData) {
                $camion = Camion::create($camionData);
                $demande->camions()->attach($camion->id);
            }

            foreach ($validatedData['citernes'] as $citerneData) {
                $citerne = Citerne::create($citerneData);
                $demande->citernes()->attach($citerne->id);
            }

            foreach ($validatedData['convoyeurs'] as $convoyeurData) {
                $convoyeur = Convoyeur::create($convoyeurData);
                $demande->convoyeurs()->attach($convoyeur->id);
            }

            // Valider la transaction
            DB::commit();

            // Rediriger l'utilisateur après avoir enregistré la demande
            return redirect()->route('demandes.index')->with('success', 'Demande créée avec succès !');
        } catch (\Exception $e) {
            // Annuler la transaction en cas d'erreur
            DB::rollBack();

            // Gérer l'exception (par exemple, enregistrer l'erreur, afficher un message convivial pour l'utilisateur)
            return back()->withInput()->with('error', 'Une erreur s\'est produite lors de la création de la demande.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $demande = Demande::findOrFail($id);
        return view('demandes.show', compact('demande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }

    public function acceptDemande(Request $request, $id)
    {
        $demande = Demande::findOrFail($id);
        $demande->etat = 2; // Accepted
        $demande->chef_idc = auth()->user()->id; // Assuming the chef_idc's id is stored in the chef_idc column
        $demande->save();

        // Additional logic or redirection
    }

    public function refuseDemande(Request $request, $id)
    {
        $demande = Demande::findOrFail($id);
        $demande->etat = 1; // Refused
        $demande->chef_idc = auth()->user()->id; // Assuming the chef_idc's id is stored in the chef_idc column
        $demande->save();

        // Additional logic or redirection
    }
}
