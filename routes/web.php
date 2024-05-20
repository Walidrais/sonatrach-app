<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\AutorisationController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('demandes.landing');
})->name('landing');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function(){

            if(Auth::user()->role==='agent'){
                Route::get('/autorisation', function () {
                    return view('autorisation.index');
                });
                return view('autorisation.index');
            }
            else if(Auth::user()->role==='chef_idc'){
                return redirect()->route('demandes.index');
            }
            else if(Auth::user()->role==='chef_complex'){
                return redirect()->route('demandes.create');
            }
    });
});

Route::resource('demandes', DemandeController::class)
    ->middleware(['auth:'.config('fortify.guard')]);

Route::put('/demandes/{id}/accept', [DemandeController::class, 'acceptDemande'])->name('demandes.accept')
    ->middleware(['auth:'.config('fortify.guard')]);
Route::put('/demandes/{id}/refuse', [DemandeController::class, 'refuseDemande'])->name('demandes.refuse')
    ->middleware(['auth:'.config('fortify.guard')]);

Route::resource('autorisation', AutorisationController::class)
    ->middleware(['auth:'.config('fortify.guard')]);

Route::get('/autorisation/{id}/download', [AutorisationController::class, 'downloadPdf'])->name('download.pdf');

Route::get('/autorisations/liste', [AutorisationController::class, 'showAll'])->name('autorisations.liste')
    ->middleware(['auth:'.config('fortify.guard')]);