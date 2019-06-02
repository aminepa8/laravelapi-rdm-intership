<!-- app/views/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Modifier matériel</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link  rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">  

    <script src="{{ asset('js/jquery.js') }}"></script>  

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>  

    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>  
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
        <li><a href="{{ URL::to('materiel') }}">Liste matériel</a></li>
        <li><a href="{{ URL::to('materiel/create') }}">Ajouter matériel</a></li>
        <li><a href="{{ URL::to('generate') }}">Session</a></li>
        <li><a href="{{ URL::to('intervention') }}">Intervention</a></li>
        <li><a href="{{ URL::to('sessioninfo') }}">Session information</a></li>
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

<h1>Modifier matériel  Barcode : {{ $materiel->id_materiel }}</h1>

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
{{ Form::model($materiel, array('route' => array('materiel.update', $materiel->id_materiel), 'method' => 'PUT')) }}

    <div class="form-group hidden">
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
        {{ Form::label('N_serie', 'Numero serie') }}
        {{ Form::text('N_serie', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_utilisateur', 'Utilisateur') }}
        {{ Form::text('id_utilisateur', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_agence_fk', 'Agence') }}
        {{ Form::select('id_agence_fk', array(
                '0' => 'RADEM SIEGE',
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
                '12' => 'RIAD ZITOUNE',), 
               Input::old('id_agence_fk'), array('class' => 'form-control')) }}
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('id_departement_fk', 'Departement') }}
        {{ Form::select('id_departement_fk', array(
        '0' => 'AFFAIRES ADMINISTRATIVES & JURIDIQUES', 
        '1' => 'FINANCIER ET COMPTABLE',
        '2' => 'CLIENTELE ET MARKETING', 
        '3' => 'LOGISTIQUE',
        '4' => 'EXPLOITATION ELECTRICITE',
        '5' => 'EXPLOITATIONS EAU ET ASSAINISSEMENT',
        '6' => 'INVESTISSEMENTS',
        '7' => 'AUDIT ET CONTRÔLE DE GESTION',
        '8' => 'SYSTEME D\'INFORMATION'), 
        Input::old('id_departement_fk'), array('class' => 'form-control')) }}
        </div>
    <div class="form-group">
        {{ Form::label('date_livraison', 'Date de livraison') }}
        {{ Form::text('date_livraison', null, array('class' => 'date form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('id_fournisseurs', 'Fournisseurs') }}
        {{ Form::text('id_fournisseurs', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('marche', 'marche') }}
        {{ Form::text('marche', null, array('class' => 'form-control')) }}
    </div>

   <div class="form-group">
        {{ Form::label('etat', 'Etat') }}
        {{ Form::select('etat', array('Active' => 'Active', 'En Panne' => 'En Panne', 'Reformee' => 'Reformee', 'A Redeployer' => 'A Redeployer'), Input::old('etat'), array('class' => 'form-control')) }}
    </div>
</div>
<div class="text-center">
    {{ Form::submit('Modifier', array('class' => 'btn btn-primary')) }}
</div>
{{ Form::close() }}
</div>
<script type="text/javascript">  

    $('.date').datepicker({  

       format: 'yyyy-mm-dd'  

     });  

</script> 
</body>
</html>
