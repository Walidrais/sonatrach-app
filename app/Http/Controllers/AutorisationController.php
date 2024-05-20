<?php

namespace App\Http\Controllers;

use App\Models\Autorisation;
use Illuminate\Http\Request;
use App\Models\Demande;
use App\Models\Camion;
use App\Models\Chauffeur;
use App\Models\Citerne;
use App\Models\Convoyeur;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Auth;

class AutorisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role==='agent'){
            return view('autorisation.index');
        }
        else if(Auth::user()->role==='chef_idc'){
            return redirect()->route('demandes.index');
        }
        else if(Auth::user()->role==='chef_complex'){
            return redirect()->route('demandes.create');
        }
        else abort(403);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role==='agent'){
            return view('autorisation.create');
        }
        else if(Auth::user()->role==='chef_idc'){
            return redirect()->route('demandes.index');
        }
        else if(Auth::user()->role==='chef_complex'){
            return redirect()->route('demandes.create');
        }
        else abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(Auth::user()->role==='agent'){
            $autorisation = Autorisation::findOrFail($id);
            return view('autorisation.show', compact('autorisation'));
        }
        else if(Auth::user()->role==='chef_idc'){
            $autorisation = Autorisation::findOrFail($id);
            return view('autorisation.show', compact('autorisation'));
        }
        else if(Auth::user()->role==='chef_complex'){
            return redirect()->route('demandes.create');
        }
        else abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autorisation $autorisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Autorisation $autorisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autorisation $autorisation)
    {
        //
    }

    public function downloadPdf($id)
    {
        if(Auth::user()->role==='agent'){
            $autorisation = Autorisation::findOrFail($id);

            // Load view
            $html = view('autorisation.pdf', compact('autorisation'))->render();

            // Configure Dompdf
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $options->set('isPhpEnabled', true);
            $options->set('isRemoteEnabled', true);

            // Instantiate Dompdf
            $dompdf = new Dompdf($options);

            // Load HTML content
            $dompdf->loadHtml($html);

            // Render PDF (optional: set paper size and orientation)
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Output PDF to browser
            return $dompdf->stream('autorisation.pdf');
        }
        
        else if(Auth::user()->role==='chef_idc'){
            return redirect()->route('demandes.index');
        }
        else if(Auth::user()->role==='chef_complex'){
            return redirect()->route('demandes.create');
        }
        else abort(403);
        
    }

    public function showAll(){

        if(Auth::user()->role==='chef_idc'){
            /*$demandes = Demande::with(['chauffeurs', 'convoyeurs', 'camions', 'citernes'])->get();
            return view('demandes.index', compact('demandes')); // Pass demandes data to the view*/

            $autorisations = Autorisation::with(['chauffeurs', 'convoyeurs', 'camions', 'citernes'])->get();
            return view('autorisation.tout', compact('autorisations'));
        }
        else if(Auth::user()->role==='agent'){
            //return redirect()->route('autorisation.index');

            $autorisations = Autorisation::with(['chauffeurs', 'convoyeurs', 'camions', 'citernes'])->get();
            return view('autorisation.tout', compact('autorisations'));
        }
        else if (Auth::user()->role === 'chef_complex') {
            /*$userId = Auth::id();
            $demandes = Demande::with(['chauffeurs', 'convoyeurs', 'camions', 'citernes'])
                                ->where('chef_complex', $userId)
                                ->get();
            return view('demandes.index', compact('demandes'));*/


            return redirect()->route('demandes.index');
        }
        else abort(403);
    }
}
