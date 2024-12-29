@extends('base')
@section('title', "Connexion")
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
        max-width: 300px;
        justify-content: space-between;
    }
    label {
        margin-right: 20px;
    }
</style>

<h1>Connexion</h1>

<form action="{{route('loginUser')}}" method="post">
@csrf
    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
    </div>
    <button>Entrer</button>
</form>
@stop