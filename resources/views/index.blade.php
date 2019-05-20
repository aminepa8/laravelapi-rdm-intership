<!-- app/views/materil/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Assets Management</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
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
                {{ Form::open(array('url' => 'materiel/' . $value->id_materiel, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
                <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('materiel/' . $value->id_materiel) }}">Show</a>

                <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('materiel/' . $value->id_materiel . '/edit') }}">Edit</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>
