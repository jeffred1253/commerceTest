@extends('base')
@section('title', "Nouvel Utilisateur")
@section('content')
<style>
    h1, button {
        display: flex;
        justify-content: center;
        margin: auto;
    }
    form {
        max-width: 500px;
        border: 1px solid black;
        border-radius: 50px;
        margin: 50px auto;
        padding: 40px;
    }
    form div {
        display: flex;
        margin: 20px;
        max-width: 400px;
    }
    form div:not(div:last-of-type) {
        justify-content: space-between;
    }
    label {
        margin-right: 20px;
    }
</style>

<h1>Nouvel Utilisateur</h1>

<form action="{{route('registerUser')}}" method="post">
@csrf
    <div>
        <label for="name">Nom d'utilisateur :</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
    </div>
    <div>
        <label for="confirmPass">Confirmer le mot de passe :</label>
        <input type="password" name="password_confirmation" id="confirmPass" required>
    </div>
    <div>
        <label for="isVendor">Compte Vendeur</label>
        <input type="checkbox" name="isVendor" id="isVendor" value="1">
    </div>
    <button>Enregistrer</button>
</form>
@stop