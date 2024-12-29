@extends('base')
@section('title', 'Liste des commandes')
@section('content')
<h1>Liste des commandes</h1>

<table class="bord">
    <tr class="bord">
        <th> Id </th>
        <th> Libellé </th>
        <th> Prix </th>
        <th> Quantité commandée </th>
    </tr>
    @foreach ($coms as $com)
        <tr>
            <td> {{$com->id}} </td>
            <td> {{$com->libelle}} </td>
            <td> {{$com->price}} F </td>
            <td> {{$com->quantity}} </td>
            <td><button><a href="{{route('commande.delete', $com->id)}}"> Supprimer </a></button></td>
        </tr>
    @endforeach
    
</table><br>
@stop