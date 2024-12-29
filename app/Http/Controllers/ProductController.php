<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class productController extends Controller
{
    // Page de création d'un nouveau produit
    public function create(){
        return view('produit.create');
    }

    // Liste des produits du vendeur connecté
    public function index(){
        $produits= Produit::where('vendor_id', auth()->user()->id)->get();
        return view('produit.index',compact('produits'));
    }

    // Enregistrement d'un nouveau produit
    public function store (Request $request){
        $produit = new Produit();
        $produit->libelle = $request->input('libelle');
        $produit->price = $request->input('price');
        $produit->quantity_stock = $request->input('quantity');
        $produit->vendor_id = auth()->user()->id;
        $produit->save();
        return redirect()->route('produit.index');
    }

    // Page de modification d'un nouveau produit
    public function edit ($id){
        //$produit = Produit::WHERE('id',$id)->get()->first();
        $produit = Produit::find($id);
        
        //dd($produit);
        return view('produit.edit', ['produit'=>$produit]);
    }

    // Suppression d'un nouveau produit
    public function delete ($id){
        $produit = produit::find($id);
        $produit->delete();
        return redirect()->route('produit.index');
    }

    // Modification d'un produit
    public function update (Request $request, $id){
        $produit = Produit::find($id);
        $produit->libelle = $request->input('libelle');
        $produit->price = $request->input('price');
        $produit->quantity_stock = $request->input('quantity');
        $produit->save();
        return redirect()->route('produit.index');
    }
}
