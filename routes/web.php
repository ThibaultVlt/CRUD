<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembresController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::(Méthode utilisé get, set, post ....)('/le chemin d'accès', [le controller::class, 'nom de la fonction (dans le controller)']);
//Page principale
Route::get('/', [MembresController::class, 'liste_membres']);
//Page d'ajout
Route::get('/ajouter', [MembresController::class, 'ajouter_membre']);
//Envoi de l'ajout
Route::post('/ajouter/traitement', [MembresController::class, 'ajouter_membre_traitement']);
//Page de modification
Route::get('/modifier/{id}', [MembresController::class, 'modifier_membre']);
//Envoi de la modification
Route::post('/modifier/traitement', [MembresController::class, 'modifier_membre_traitement']);
//Page de suppression
Route::get('/supprimer/{id}', [MembresController::class, 'supprimer_membre']);

