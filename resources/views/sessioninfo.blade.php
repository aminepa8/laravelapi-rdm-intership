
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
<div class="row">
    <div class="col-md-8">
        <h3>Session Information</h3>
        {{ Form::open(array('class' => 'form-inline','url' => 'sessioninfo')) }}
            <div class="form-group">
                    {!! Form::Label('code_session', 'Code Session:') !!}
                    <select class="form-control" name="code_session">
                            @foreach($codesSession as $item)
                              <option value="{{$item->code_session}}">{{$item->code_session}}</option>
                            @endforeach
                    </select>
            </div>
            <div class="form-group" style="margin-left:50px;">
                    {!! Form::Label('filter_mode', 'Filter Mode:') !!}
                    <select class="form-control" name="filter_mode">
                            <option value="0">Exist</option>
                            <option value="1"> Not Exist</option>
                    </select>        
            </div>
         
                <button style="margin-left:50px;" type="submit" class="btn btn-primary">Filter</button>
           
        {{ Form::close() }}
    </div> 
</div>
<div class="row" style="margin-top:20px;">
            <table style="width:95%;margin:auto;" class="table table-striped table-bordered">
                   
                    <thead>
                            <tr>
                                <td>ID Materiel</td>
                                <td>Materiel Details</td>
                            </tr>
                        </thead>
                        <tbody>
                                @if (isset($materiel))
                            @foreach($materiel as $key => $value)
                                <tr>
                                    <td>{{ $value->id_materiel_fk }}</td>
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

</div>
</body>
</html>