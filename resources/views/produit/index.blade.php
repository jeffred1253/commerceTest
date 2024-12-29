@extends('base')
@section('title', 'Liste des produits')
@section('content')
<h1>Liste des produits</h1>

<table class="bord">
    <tr class="bord">
        <th> Id </th>
        <th> Libellé </th>
        <th> Prix </th>
        <th> Quantité en stock </th>
        <th colspan="2"> Actions </th>
    </tr>
    @foreach ($produits as $produit)
        <tr>
            <td> {{$produit->id}} </td>
            <td> {{$produit->libelle}} </td>
            <td> {{$produit->price}} F </td>
            <td> {{$produit->quantity_stock}} </td>
            <td><button><a href="{{route('produit.edit', $produit->id)}}"> Modifier </a></button></td>
            <td><button><a href="{{route('produit.delete', $produit->id)}}"> Supprimer </a></button></td>
        </tr>
    @endforeach
    
</table><br>
<button><a href="{{route('produit.create')}}"> Ajouter </a></button>
<button><a href="{{route('listCommandeVendor')}}"> Liste des commandes </a></button>
@stop