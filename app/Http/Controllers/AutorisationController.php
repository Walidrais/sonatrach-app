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

class AutorisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('autorisation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autorisation.create');
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
        $autorisation = Autorisation::findOrFail($id);
        return view('autorisation.show', compact('autorisation'));
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
        $autorisation = Autorisation::findOrFail($id);

        // Load view
        $html = view('autorisation.pdf', compact('autorisation'))->render();

        // Configure Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

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
}
