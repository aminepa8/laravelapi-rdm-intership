
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
        
    <div class="col-md-6">
            <h3>Session code generator</h3>
        <div class="card-body">
                    {{ Form::open(array('class' => 'form-inline','url' => 'generate')) }}
                    <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control " disabled placeholder="Session code" 
                    value="@if(session('genCode')) {{session('genCode')}} @endif">
                    </div>
                    <button type="submit" class="btn btn-primary">Generate Session Code</button>
                    {{ Form::close() }}
        </div>

    </div>
    <div class="col-md-6">
        <h3>Session List</h3>
            <table class="table table-striped table-bordered">
                    @if (isset($Session))
                    <thead>
                        <tr>
                            <td>Code Session</td>
                            <td>Date</td>
                        </tr>
                    </thead>
                    <tbody>
                       
                            @foreach($Session as $key => $value)
                                <tr>
                                    <td>{{ $value->code_session }}</td>
                                    <td>{{ $value->date_session }}</td>
                                </tr>
                            @endforeach
                        @endif
                    
                    </tbody>
                </table>
    </div>

</div>
</div>
</body>
</html>