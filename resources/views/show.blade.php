<!-- app/views/nerds/show.blade.php -->

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

<h1>Barcode : {{ $materiel->id_materiel }}</h1>

<div class="card-body">
        <p>
             <strong>type:</strong>{{ $materiel->type }} <br>
             <strong>modele:</strong>{{ $materiel->modele }} <br>
             <strong>Numero serie:</strong>{{ $materiel->N_serie }} <br>
             <strong>Utilisateur:</strong>{{ $materiel->id_utilisateur }} <br>
             <strong>Agence:</strong>{{ $materiel->id_agence_fk }} <br>
             <strong>Departement:</strong>{{ $materiel->id_departement_fk }} <br>
             <strong>Date de livraison:</strong>{{ $materiel->date_livraison }} <br>
             <strong>Fournisseurs:</strong>{{ $materiel->id_fournisseurs }} <br>
             <strong>Marche:</strong>{{ $materiel->marche }} <br>
             <strong>Etat:</strong>{{ $materiel->etat }} 
        </p>
    </div>

</div>
</body>
</html>