<!-- app/views/nerds/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Assets Management</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
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

<h1>Barcode : {{ $materiel[0]->id_materiel }}</h1>

    <div class="card-body">
            <table class="table">
                    <tbody>
                        <tr>
                            <th>type:</th>
                            <td>   {{ $materiel[0]->type }} </td>
                        </tr>
                        <tr>
                            <th>modele:</th>
                            <td>{{ $materiel[0]->modele }} </td>
                        </tr>
                        <tr>
                            <th>Numero serie:</th>
                            <td>{{ $materiel[0]->N_serie }} </td>
                        </tr>
                        <tr>
                            <th>Utilisateur:</th>
                            <td>{{ $materiel[0]->id_utilisateur }} </td>
                        </tr>
                        <tr>
                            <th>Agence:</th>
                            <td>{{ $materiel[0]->label_agence }} </td>
                        </tr>
                        <tr>
                            <th>Departement:</th>
                            <td>{{ $materiel[0]->label_departement }} </td>
                        </tr>
                        <tr>
                            <th>Date de livraison:</th>
                            <td>{{ $materiel[0]->date_livraison }} </td>
                        </tr>
                        <tr>
                            <th>Fournisseurs:</th>
                            <td>{{ $materiel[0]->id_fournisseurs }} </td>
                        </tr>
                        <tr>
                            <th>Marche:</th>
                            <td>{{ $materiel[0]->marche }} </td>
                        </tr>
                        <tr>
                            <th>Etat:</th>
                            <td>{{ $materiel[0]->etat }} </td>
                        </tr>
               </tbody>
            </table>
       
    </div>

</div>
</body>
</html>