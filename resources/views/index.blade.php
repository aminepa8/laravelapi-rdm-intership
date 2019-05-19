<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('materiel') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('api/materiel') }}">View All Nerds</a></li>
        <li><a href="{{ URL::to('api/materiel/create') }}">Create a Nerd</a>
    </ul>
</nav>

<h1>All the Materiels</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID Materiel</td>
            <td>Type</td>
            <td>Modele</td>
            <td>N_Serie</td>
            <td>Utilisateur</td>
            <td>Agence</td>
            <td>Departement</td>
            <td>Date Livraison</td>
            <td>Fournisseurs</td>
            <td>Marche</td>
            <td>Etat</td>
        </tr>
    </thead>
    <tbody>
    @foreach($materiel as $key => $value)
        <tr>
            <td>{{ $value->id_materiel }}</td>
            <td>{{ $value->type }}</td>
            <td>{{ $value->modele }}</td>
            <td>{{ $value->N_serie }}</td>
            <td>{{ $value->id_utilisateur }}</td>
            <td>{{ $value->id_agence_fk }}</td>
            <td>{{ $value->id_departement_fk }}</td>
            <td>{{ $value->date_livraison }}</td>
            <td>{{ $value->id_fournisseurs }}</td>
            <td>{{ $value->marche }}</td>
            <td>{{ $value->etat }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                <!-- we will add this later since its a little more complicated than the other two buttons -->

                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('api/materiel/' . $value->id_materiel) }}">Show this Nerd</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('api/materiel/' . $value->id_materiel . '/edit') }}">Edit this Nerd</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
