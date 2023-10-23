<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;


Route::get('/', function () {
    return view('welcome');
});
/*------------------------------------------------------*/
Route::get('/boutique', [ProduitController::class, 'index'])->name('boutique');
Route::get('/detailproduit/{id}', [ProduitController::class, 'detailproduit'])->name('detailproduit');
Route::post('/ajouter_panier', [CommandeController::class, 'add_panier_traitement']);
/*------------------------------------------------------*/
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
/*------------------------------------------------------*/
Route::get('/adminproduit', [AdminController::class, 'listeproduit'])->name('adminproduit');
Route::post('/add_produit', [AdminController::class, 'add_produit_traitement']);
Route::get('/delete_produit/{id}', [AdminController::class, 'delete_produit_traitement']);
Route::get('/updateproduit/{id}', [AdminController::class, 'updateproduit']);
Route::post('/update_produit', [AdminController::class, 'update_produit_traitement']);
Route::get('/reaproproduit/{id}', [AdminController::class, 'reapro_produit_traitement']);
Route::get('/admincommande', [AdminController::class, 'index_commande'])->name('admincommande');
/*------------------------------------------------------*/
Route::get('/actualiser', [AdminController::class, 'actualiser'])->name('actualiser');
/*------------------------------------------------------*/
Route::get('/inscription', [ClientController::class, 'index_inscription'])->name('inscription');
Route::post('/add_client', [ClientController::class, 'add_client_traitement']);
/*------------------------------------------------------*/
Route::get('/connexion', [ClientController::class, 'index_connexion'])->name('connexion');
Route::post('/login_client', [ClientController::class, 'login_client_traitement']);
/*------------------------------------------------------*/
Route::get('/deconnexion', [ClientController::class, 'client_deconnexion']);
/*------------------------------------------------------*/
Route::get('/terminer_commande', [CommandeController::class, 'terminercommande']);
Route::get('/valide_commande', [CommandeController::class, 'valide_commande_traitement']);
Route::get('/liste_commande', [CommandeController::class, 'listecommande'])->name('liste_commande');
Route::get('/voir_commande/{id}', [CommandeController::class, 'voircommande']);
Route::get('/dimproduit/{id}', [CommandeController::class, 'dim_produit_traitement']);
Route::get('/imprimer_commande/{id}', [CommandeController::class, 'imprimer_commande_traitement']);


