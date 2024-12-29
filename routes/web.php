<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('dashboard');
});

// Enregistrement de l'utilisateur
Route::post('/register', [AuthController::class, 'storeUser'])->name('registerUser');
// Affichage du formulaire d'enregistrement
Route::get('/register', function () { return view('authentication.register'); })->name('registerUserForm');

// Connexion de l'utilisateur
Route::post('/login', [AuthController::class, 'connexion'])->name('loginUser');
// Affichage du formulaire de connexion
Route::get('/login', function () { return view('authentication.login'); })->name('loginForm');

Route::middleware(['auth:sanctum'])->group(function () {
    // Enregistrement de l'ID kkiaPay
    Route::post('/registerAccountID', [AuthController::class, 'registerAccountID'])->name('registerAccountID');
    // Affichage du formulaire d'enregistrement de l'ID kkiaPay
    Route::get('/registerAccountID/{id}', function ($id) { return view('authentication.kkiaPay', ['id'=>$id]); })->name('registerAccountIDForm');

    // Affichage de la liste des commande pour le vendeur connecté
    Route::get('/commandeVendor', [CommandeController::class, 'listForVendor'])->name('listCommandeVendor');

    // Liste des produits
    Route::get('produit', [productController::class, 'index'])->name('produit.index');
    // Formulaire de création de produit
    Route::get('produit/create', [productController::class, 'create'])->name('produit.create');
    // Stockage de produit
    Route::post('produit/store', [ProductController::class, 'store'])->name('produit.store');
    // Formulaire de modification de produit
    Route::get('produit/edit/{id}', [ProductController::class, 'edit'])->name('produit.edit');
    // Enregistrement des modifications de produit
    Route::post('produit/update/{id}', [ProductController::class, 'update'])->name('produit.update');
    // Suppression de produit
    Route::get('produit/delete/{id}', [ProductController::class, 'delete'])->name('produit.delete');
});

Route::middleware(['auth:sanctum'])->group(function () {
    // Enregistrement de produits du panier
    Route::get('/storeCommande', [CommandeController::class, 'storePannier'])->name('storeCommande');
    // Affichage du formulaire de choix de produits pour le panier
    Route::get('/newCommande', [CommandeController::class, 'newPannier'])->name('newCommande');
    // Affichage de la liste des commande du client connecté
    Route::get('/commandeCustomer', [CommandeController::class, 'listForCustomer'])->name('listCommandeCustomer');
    // Suppression de commande
    Route::get('/delCommande/{id}', [CommandeController::class, 'delete'])->name('commande.delete');
});