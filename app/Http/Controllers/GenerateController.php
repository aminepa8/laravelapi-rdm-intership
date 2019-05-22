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
class GenerateController extends BaseController  {
    public function __construct()
    {
        $this->middleware('auth');
    }
public function index()
    {
        $Session = DB::table('session')->get();
               return View::make('generate') ->with('Session', $Session);
    }

    public function create(){
        $date =  date("Y-m-d");
        //function that generate random key 
        function random_string($length) {
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'),range('A', 'Z'));
        
            for ($i = 0; $i < $length; $i++) {
                $key .= $keys[array_rand($keys)];
            }
        
            return $key;
        }
        
        $genCode = random_string(5); //random key of length 5
        DB::table('session')->insert([
                'code_session'  => $genCode,
                'date_session'  => $date,
            ]);
            // redirect
            Session::flash('genCode', $genCode);
            return Redirect::to('generate');
    }
}