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
Route::get('/', [MembresController::class, 'liste_membres']);
Route::get('/ajouter', [MembresController::class, 'ajouter_membre']);
Route::post('/ajouter/traitement', [MembresController::class, 'ajouter_membre_traitement']);
