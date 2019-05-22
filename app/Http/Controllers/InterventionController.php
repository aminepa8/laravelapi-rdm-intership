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
class InterventionController extends BaseController  {
    public function __construct()
    {
        $this->middleware('auth');
    }
public function index()
    {
        $Intervention = DB::table('intervention')->get();
               return View::make('intervention') ->with('Intervention', $Intervention);;
    }


}