<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Employe;
use App\Models\Salon;


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [AdminController::class, 'index'])->name('home');

Route::get('/creer_service', [AdminController::class, 'creer_service']);

Route::post('/ajoute_service', [AdminController::class, 'ajoute_service']);

Route::get('/voir_service', [AdminController::class, 'voir_service']);

Route::get('/service_supprimer/{id}', [AdminController::class, 'service_supprimer']);

Route::get('/service_mjour/{id}', [AdminController::class, 'service_mjour']);

Route::post('/edit_service/{id}', [AdminController::class, 'edit_service']);

Route::post('/ajoute_booking', [HomeController::class, 'ajoute_booking']);

Route::get('/facture/{id}', [HomeController::class, 'facture'])->name('facture');

Route::get('/reservations', [AdminController::class, 'reservations']);

Route::get('/Supprimer_booking/{id}', [AdminController::class, 'Supprimer_booking']);


Route::get('/Valider/{id}', [AdminController::class, 'Valider'])->name('booking.valider');
Route::post('/Refuser/{id}', [AdminController::class, 'Refuser'])->name('booking.refuser');

Route::get('/accueil', function () {
    return view('admin.index');
})->name('accueil');


Route::post('/refuser-reservation/{id}', [AdminController::class, 'Refuser'])->name('refuser-reservation');

Route::get('/reservation-validee', [AdminController::class, 'reservationValidee'])->name('reservation.validee');
Route::get('/reservation-refusee', [AdminController::class, 'reservationRefusee'])->name('reservation.refusee');


Route::get('/envoyer-confirmation-validation/{id}', [AdminController::class, 'envoyerConfirmationValidation'])->name('envoyer.confirmation.validation');
Route::get('/envoyer-confirmation-refus/{id}', [AdminController::class, 'envoyerConfirmationRefus'])->name('envoyer.confirmation.refus');
Route::get('/envoyer-toutes-confirmations-validation', [AdminController::class, 'envoyerToutesConfirmationsValidation'])->name('envoyer.toutes.confirmations.validation');
Route::get('/envoyer-toutes-confirmations-refus', [AdminController::class, 'envoyerToutesConfirmationsRefus'])->name('envoyer.toutes.confirmations.refus');



    
    Route::get('/creer-employe', [AdminController::class, 'creer_employe'])->name('creer_employe');
    Route::post('/ajouter-employe', [AdminController::class, 'ajouter_employe'])->name('ajouter_employe');
    
    
    Route::get('/voir-employes', [AdminController::class, 'voir_employes'])->name('voir_employes');
    
   
    Route::get('/modifier-employe/{id}', [AdminController::class, 'modifier_employe'])->name('modifier_employe');
    Route::put('/update-employe/{id}', [AdminController::class, 'update_employe'])->name('update_employe');
    
   
    Route::get('/supprimer-employe/{id}', [AdminController::class, 'supprimer_employe'])->name('supprimer_employe');
