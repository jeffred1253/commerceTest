<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    // Sauvegarde du pannier
    public function storePannier(Request $request)
    {
        Commande::create($request->all());
        return redirect()->route('newCommande');
    }

    // Page de remplissage du panier
    public function newPannier () {
        $produits= Produit::all();
        return view('pannier.newCommande',compact('produits'));
    }

    // Liste pour le vendeur dont
    public function listForVendor()
    {
        $coms = User::join('commandes', 'commandes.customer_id', '=', 'users.id')
            ->join('produits', 'commandes.product_id', '=', 'produits.id')
            ->where('produits.vendor_id', auth()->user()->id)
            ->select('produits.*', 'users.name', 'commandes.quantity')
            ->get();
        return view('pannier.listForVendor', compact('coms'));
    }

    // Liste des commandes du client dont l'id est $id
    public function listForCustomer()
    {
        $coms = User::join('commandes', 'commandes.customer_id', '=', 'users.id')
            ->join('produits', 'produits.id', '=', 'commandes.product_id')
            ->where('users.id', auth()->user()->id)
            ->select('commandes.*', 'produits.libelle', 'produits.price')
            ->get();
        return view('pannier.listForCustomer', compact('coms'));
    }

    // Suppression d'une commande
    public function delete ($id){
        $commande = Commande::find($id);
        $commande->delete();
        return redirect()->route('listCommandeCustomer');
    }
}
