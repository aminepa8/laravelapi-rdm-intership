<!-- app/views/nerds/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Assets Management</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('api/materiel') }}">Home</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('api/materiel') }}">View All Assets</a></li>
        <li><a href="{{ URL::to('api/materiel/create') }}">Add new Asset</a>
    </ul>
</nav>

<h1>Barcode : {{ $materiel->id_materiel }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $materiel->id_materiel }}</h2>
        <p>
             <strong>type:</strong>{{ $materiel->type }} <br>
             <strong>modele:</strong>{{ $materiel->modele }} <br>
             <strong>N_serie:</strong>{{ $materiel->N_serie }} <br>
             <strong>id_utilisateur:</strong>{{ $materiel->id_utilisateur }} <br>
             <strong>id_agence_fk:</strong>{{ $materiel->id_agence_fk }} <br>
             <strong>id_departement_fk:</strong>{{ $materiel->id_departement_fk }} <br>
             <strong>date_livraison:</strong>{{ $materiel->date_livraison }} <br>
             <strong>id_fournisseurs:</strong>{{ $materiel->id_fournisseurs }} <br>
             <strong>marche:</strong>{{ $materiel->marche }} <br>
             <strong>etat:</strong>{{ $materiel->etat }} 
        </p>
    </div>

</div>
</body>
</html>