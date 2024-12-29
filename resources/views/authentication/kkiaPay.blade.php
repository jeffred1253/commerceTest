@extends('base')
@section('title', "ID kkiapay")
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

<h1>Veuillez renseigner votre ID kkiaPay</h1>

<form action="{{route('registerAccountID')}}" method="post">
@csrf
    <div>
        <label for="kkiapay_ID">ID kkiaPay :</label>
        <input type="text" name="kkiapay_ID" id="kkiapay_ID">
    </div>
    <input type="hidden" value="{{$id}}" name="user_id">
    <button>Entrer</button>
</form>
@stop