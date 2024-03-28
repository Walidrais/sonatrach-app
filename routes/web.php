<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\AutorisationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('demandes', DemandeController::class)
    ->middleware(['auth:'.config('fortify.guard')]);

Route::put('/demandes/{id}/accept', [DemandeController::class, 'acceptDemande'])->name('demandes.accept');
Route::put('/demandes/{id}/refuse', [DemandeController::class, 'refuseDemande'])->name('demandes.refuse');

Route::resource('autorisation', AutorisationController::class)
    ->middleware(['auth:'.config('fortify.guard')]);

Route::get('/autorisation/{id}/download', [AutorisationController::class, 'downloadPdf'])->name('download.pdf');