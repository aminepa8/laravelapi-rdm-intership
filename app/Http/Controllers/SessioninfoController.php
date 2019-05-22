<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller as BaseController;
use App\Materiel;
use Validator;
use Session;
class SessioninfoController extends BaseController  {
    public function __construct()
    {
        $this->middleware('auth');
    }

public function index()
    {
        $codesSession = DB::table('session')->get();
          return View::make('sessioninfo')->with('codesSession', $codesSession);
    }
    public function show()
    {
        $code = Input::get('code_session');
        $modeFilter = Input::get('filter_mode');
        $codesSession = DB::table('session')->get();

        if ($modeFilter==0) {
            $materiel = collect(DB::select("select id_materiel_fk from session,infosession where
            id_session_fk = id_session and code_session = '$code'"));
             return view::make('sessioninfo')
            ->with('materiel', $materiel)
            ->with('codesSession', $codesSession)
            ->withInput(Input::all());
        }
         if ($modeFilter==1) {
            $materiel = collect(DB::select("select id_materiel as id_materiel_fk from materiel
            where id_materiel not in(
            select id_materiel_fk from session,infosession where
                        id_session_fk = id_session and code_session = '$code')"));
             return view::make('sessioninfo')
            ->with('materiel', $materiel)
            ->with('codesSession', $codesSession)
            ->withInput(Input::all());
        }
    }

    
}