<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="justify-content: center">
    <div>
        <h1>Veuillez créer votre compte</h1>
        <a href="{{route('registerUserForm')}}"><button>Nouveau compte</button></a>
    </div>
    <div>
        <h2>Si vous avez déjà un compte, veuillez vous connecter</h2>
        <a href="{{route('loginForm')}}"><button>Se connecter</button></a>
    </div>
</body>
</html>