<!-- app/views/nerds/create.blade.php -->

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

<h1>Add new Asset</h1>

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




{{ Form::open(array('url' => 'api/materiel')) }}

    <div class="form-group">
        {{ Form::label('id_materiel', 'id_materiel') }}
        {{ Form::text('id_materiel', Input::old('id_materiel'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('type', 'type') }}
        {{ Form::text('type', Input::old('type'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('modele', 'modele') }}
        {{ Form::text('modele', Input::old('modele'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('N_serie', 'N_serie') }}
        {{ Form::text('N_serie', Input::old('N_serie'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_utilisateur', 'id_utilisateur') }}
        {{ Form::text('id_utilisateur', Input::old('id_utilisateur'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_agence_fk', 'id_agence_fk') }}
        {{ Form::text('id_agence_fk', Input::old('id_agence_fk'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_departement_fk', 'id_departement_fk') }}
        {{ Form::text('id_departement_fk', Input::old('id_departement_fk'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('date_livraison', 'date_livraison') }}
        {{ Form::text('date_livraison', Input::old('date_livraison'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_fournisseurs', 'id_fournisseurs') }}
        {{ Form::text('id_fournisseurs', Input::old('id_fournisseurs'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('marche', 'marche') }}
        {{ Form::text('marche', Input::old('marche'), array('class' => 'form-control')) }}
    </div>

   <div class="form-group">
        {{ Form::label('etat', 'etat') }}
        {{ Form::select('etat', array('ok' => 'ok', 'En Panne' => 'En Panne', 'Reformee' => 'Reformee', 'A Redeployer' => 'A Redeployer'), Input::old('etat'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add Materiel', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>