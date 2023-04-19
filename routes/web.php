<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaiementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// factures
Route::get('/factures/{user}',[FactureController::class,'index'])->whereNumber('user');
Route::get('/facture/{user}/create ',[FactureController::class,'create'])->whereNumber('user');
Route::get('/facture/{id}/generate',[FactureController::class,'generateFacture'])->whereNumber('id');
Route::post('{user}/facture/create',[FactureController::class,'store'])->whereNumber('user');
Route::get('/facture/{facture}/edit',[FactureController::class,'edit']);
Route::patch('/facture/{facture} ',[FactureController::class,'update']);
Route::get('/facture/{id}/delete',[FactureController::class,'destroy'])->whereNumber('id');
//Route::delete('/facture/{id}',[FactureController::class,'destroy']);


//Paiemets
Route::get('/paiements/{user}',[PaiementController::class,'index'])->whereNumber('user');
Route::get('/paiement/{user}/create ',[PaiementController::class,'create'])->whereNumber('user');
Route::get('/paiement/{id}/generate',[PaiementeController::class,'generatePaiement'])->whereNumber('id');
Route::post('{user}/paiement/create',[PaiementController::class,'store'])->whereNumber('user');
Route::get('/paiement/{paiement}/edit',[PaiementController::class,'edit']);
Route::patch('/paiement/{paiement} ',[PaiementController::class,'update']);
Route::get('/paiement/{id}/delete',[PaiementController::class,'destroy'])->whereNumber('id');
Route::get('/get-data',[PaiementController::class,'getData']);
// Produit
//Route::get('/produit/create',[ProduitController::class,'create']);
Route::post('/{user}/produit',[ProduitController::class,'store'])->whereNumber('user');
// Service
//Route::get('/service/create',[ServiceController::class,'create']);
Route::post('/{user}/service',[ServiceController::class,'store'])->whereNumber('user');

/////////////////////////////////////////////////////////////////////
Route::get('/', function () {
    return view('welcome');
});
