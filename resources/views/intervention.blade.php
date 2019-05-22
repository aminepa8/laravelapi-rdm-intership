<!-- app/views/intervention.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Assets Management</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
    <style>
    .btn{
        margin-bottom:3px;
    }
    </style>
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('materiel') }}">Home</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('materiel') }}">View All Assets</a></li>
        <li><a href="{{ URL::to('materiel/create') }}">Add new Asset</a></li>
        <li><a href="{{ URL::to('generate') }}">Session</a></li>
        <li><a href="{{ URL::to('intervention') }}">Intervention</a></li>
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

<h1>Intervention</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID Materiel</td>
            <td>Observation</td>
            <td>Date PB</td>
        </tr>
    </thead>
    <tbody>
    @if (isset($Intervention))
        @foreach($Intervention as $key => $value)
            <tr>
                <td>{{ $value->id_materiel_fk }}</td>
                <td>{{ $value->observation }}</td>
                <td>{{ $value->datepb }}</td>
                <td>
                    <!-- show the materiel (uses the show method found at GET /materiel/{id} -->
                    <a class="btn btn-small btn-success" href="{{ URL::to('materiel/' . $value->id_materiel_fk) }}">Show</a>

                </td>
            </tr>
        @endforeach
       @endif 
    </tbody>
</table>
</div>
</body>
</html>
