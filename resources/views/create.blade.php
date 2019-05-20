<!-- app/views/nerds/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Assets Management</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
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
    <ul class="nav navbar-nav navbar-right">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
    
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
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


<div class="col-md-6">
{{ Form::open(array('url' => 'materiel')) }}

    <div class="form-group">
        {{ Form::label('id_materiel', 'Barcode') }}
        {{ Form::text('id_materiel', Input::old('id_materiel'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('type', 'Type') }}
        {{ Form::text('type', Input::old('type'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('modele', 'Modele') }}
        {{ Form::text('modele', Input::old('modele'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('N_serie', 'N_serie') }}
        {{ Form::text('N_serie', Input::old('N_serie'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_utilisateur', 'Utilisateur') }}
        {{ Form::text('id_utilisateur', Input::old('id_utilisateur'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_agence_fk', 'Agence') }}
        {{ Form::select('id_agence_fk', array('0' => 'RADEM SIEGE',
  '1' => 'SBATA',
         '2' => 'BASSATINE',
          '3' => 'SIDI BABA',
          '4' => 'ELMENZEH',
          '5' => 'MEDINA',
          '6' => 'WISLANE',
          '7' => 'SBZ',
          '8' => 'MANSOUR',
          '9' => 'BELLE VUE',
          '10' => 'POSTE 50',
          '11' => 'DKHISSA',
          '11' => 'RIAD ZITOUNE',), 
         Input::old('etat'), array('class' => 'form-control')) }}
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('id_departement_fk', 'Departement') }}
        {{ Form::select('id_departement_fk', array('0' => 'AFFAIRES ADMINISTRATIVES & JURIDIQUES', 
        '1' => 'FINANCIER ET COMPTABLE',
        '2' => 'CLIENTELE ET MARKETING', 
        '4' => 'LOGISTIQUE',
        '5' => 'EXPLOITATION ELECTRICITE',
        '6' => 'EXPLOITATIONS EAU ET ASSAINISSEMENT',
        '7' => 'INVESTISSEMENTS',
        '8' => 'AUDIT ET CONTRÔLE DE GESTION',
        '9' => 'SYSTEME D\'INFORMATION'), 
        Input::old('id_departement_fk'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('date_livraison', 'Date de livraison') }}
        {{ Form::text('date_livraison', Input::old('date_livraison'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_fournisseurs', 'Fournisseurs') }}
        {{ Form::text('id_fournisseurs', Input::old('id_fournisseurs'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('marche', 'Marche') }}
        {{ Form::text('marche', Input::old('marche'), array('class' => 'form-control')) }}
    </div>

   <div class="form-group">
        {{ Form::label('etat', 'Etat') }}
        {{ Form::select('etat', array('Active' => 'Active', 'En Panne' => 'En Panne',
         'Reformee' => 'Reformee', 'A Redeployer' => 'A Redeployer'), 
         Input::old('etat'), array('class' => 'form-control')) }}
    </div>
</div>

        <div class="text-center">
    {{ Form::submit('Add Materiel', array('class' => 'btn btn-primary')) }}
        </div>
    
</div>

</div>
{{ Form::close() }}



</div>
</div>
</body>
</html>