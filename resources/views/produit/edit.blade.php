@extends('base')
@section('title', "Modification d'un produit")
@section('content')
<h1>Modification d'un produit</h1>

<form action="{{route('produit.update', $produit->id)}}" method="post">
@csrf
    <fieldset>
        <legend>MODIFICATION D'UN PRODUIT</legend>
        
        <input type="text" name="libelle" value="{{$produit->libelle}}" id="" placeholder="Libellé">
        <input type="number" name="price" value="{{$produit->price}}" id="" placeholder="Prix de vente">
        <input type="number" name="quantity" value="{{$produit->quantity_stock}}" id="" placeholder="Quantité en stock">
        <button><a href="{{route('produit.index')}}">Retour</a></button>
        <button type="submit"> Enregistrer </button>
    </fieldset>
</form>
@stop