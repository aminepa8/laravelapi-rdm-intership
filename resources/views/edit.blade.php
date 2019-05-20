<!-- app/views/nerds/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Asset</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('materiel') }}">Home</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('materiel') }}">View All Assets</a></li>
        <li><a href="{{ URL::to('materiel/create') }}">Add new Asset</a>
    </ul>
</nav>

<h1>Edit Materiel Barcode : {{ $materiel->id_materiel }}</h1>

<!-- if there are creation errors, they will show here -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::model($materiel, array('route' => array('materiel.update', $materiel->id_materiel), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('id_materiel', 'id_materiel') }}
        {{ Form::text('id_materiel', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('type', 'type') }}
        {{ Form::text('type', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('modele', 'modele') }}
        {{ Form::text('modele', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('N_serie', 'N_serie') }}
        {{ Form::text('N_serie', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_utilisateur', 'id_utilisateur') }}
        {{ Form::text('id_utilisateur', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_agence_fk', 'id_agence_fk') }}
        {{ Form::text('id_agence_fk', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_departement_fk', 'id_departement_fk') }}
        {{ Form::text('id_departement_fk', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('date_livraison', 'date_livraison') }}
        {{ Form::text('date_livraison', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_fournisseurs', 'id_fournisseurs') }}
        {{ Form::text('id_fournisseurs', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('marche', 'marche') }}
        {{ Form::text('marche', null, array('class' => 'form-control')) }}
    </div>

   <div class="form-group">
        {{ Form::label('etat', 'etat') }}
        {{ Form::select('etat', array('ok' => 'ok', 'En Panne' => 'En Panne', 'Reformee' => 'Reformee', 'A Redeployer' => 'A Redeployer'), Input::old('etat'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Asset!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
