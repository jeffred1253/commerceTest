@extends('base')
@section('title', "Enregistrement d'un produit")
@section('content')
<h1>Création d'un produit</h1>

<form action="{{route('produit.store')}}" method="post">
@csrf
    <fieldset>
        <legend>ENREGISTREMENT D'UN PRODUIT</legend>
        
        <input type="text" name="libelle" id="" placeholder="Libellé" required>
        <input type="number" name="price" id="" placeholder="Prix de vente" required>
        <input type="number" name="quantity" id="" placeholder="Quantité" required>
        <button type="submit"> Enregistrer </button>
    </fieldset>
</form>
@stop