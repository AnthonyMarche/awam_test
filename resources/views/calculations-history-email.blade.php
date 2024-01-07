<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Calculs effectués le : {{ $date }}</h1>
@if(count($calculationsHistory) > 0)
    <ul>
        @foreach($calculationsHistory as $calculation)
            <li>{{ $calculation->detail }}</li>
        @endforeach
    </ul>
@else
    Aucun calcul n'a été effectué ce jour.
@endif

</body>
</html>
