@extends('base')
@section('title', 'Choix des produits')
@section('content')
<h1>Pannier de produits</h1>

<table class="bord">
    <tr class="bord">
        <th> Id </th>
        <th> Libellé </th>
        <th> Prix </th>
        <th> Quantité voulu </th>
    </tr>
    @foreach ($produits as $produit)
        <tr>
            <td> {{$produit->id}} </td>
            <td> {{$produit->libelle}} </td>
            <td> {{$produit->price}} F </td>
            <form action="{{route('storeCommande')}}" method="get">
                <input type="hidden" name="customer_id" value="{{auth()->user()->id}}">
                <input type="hidden" name="product_id" value="{{$produit->id}}">
                <td> <input type="number" name="quantity" value="1"> </td>
                <td> <input type="submit" value="Commander"> </td>
            </form>
        </tr>
    @endforeach
</table><br>
<a href="{{route('listCommandeCustomer')}}"><button> Panier </button></a>
@stop