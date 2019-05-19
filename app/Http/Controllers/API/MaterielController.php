<?php
namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller as BaseController;
use App\Materiel;
use Validator;
use Session;
class MaterielController extends BaseController  {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // get all the materiels
        $materiel = DB::table('Materiel')->get();

        // load the view and pass the nerds
     
        return View::make('index')
            ->with('materiel', $materiel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // load the create form (app/views/nerds/create.blade.php)
        return View::make('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'id_materiel' => 'required',
            'type' => 'required',
            'modele'=> 'required',
            'N_serie'=> 'required',
            'id_utilisateur'=>'required',   
            'id_agence_fk'=>'required',
            'id_departement_fk'=>'required',
            'date_livraison'=>'required',
            'id_fournisseurs'=>'required',
            'marche'=>'required',
            'etat'=>'required', 
      
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('api/materiel/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            DB::table('Materiel')->insert([
                'id_materiel'  => Input::get('id_materiel'),
                'type'  => Input::get('type'),
                'modele' => Input::get('modele'),
                'N_serie' => Input::get('N_serie'),
                'id_utilisateur' => Input::get('id_utilisateur'),
                'id_agence_fk' => Input::get('id_agence_fk'),
                'id_departement_fk' => Input::get('id_departement_fk'),
                'date_livraison' => Input::get('date_livraison'),
                'id_fournisseurs' => Input::get('id_fournisseurs'),
               'marche' => Input::get('marche'),
               'etat' => Input::get('etat')
            ]);

            // redirect
            Session::flash('message', 'Successfully created Materiel!');
            return Redirect::to('api/materiel');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        // get the nerd
        $materiel =  DB::table('Materiel')->where('id_materiel',$id)->first();

        // show the view and pass the nerd to it
        return View::make('show')
            ->with('materiel', $materiel);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}