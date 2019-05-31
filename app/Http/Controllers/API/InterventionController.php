<?php
//I should make a model for materiel table to check by id_materiel

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\BaseController as BaseController;

use App\Intervention;
use Validator;
use App\Materiel;


class InterventionController extends BaseController 
{
   /* private $apiToken;
    public function __construct()
    {
      // Unique Token
      $this->apiToken = 'amineamine';//uniqid(base64_encode(str_random(60))); amineamine is the token value
    }*/
    public function show(Request $request,$barcode)
    {
        $token = $request->header('Authorization');
        $test = DB::table('apitoken')->where('api_token', $token)->first();
        if (is_null($test)) {
            return $this->sendError('API CODE invalide');
        }
         $Check = DB::table('materiel')->where('id_materiel', $barcode)->first();
        

         if (is_null($Check)) {
            return $this->sendError('0'); //0 mean the Barcode not found
         }
         $materiel = DB::select("select id_materiel,type,modele,N_serie,id_utilisateur,etat
         from materiel ,agence,departement 
         where id_departement_fk = id_departement and materiel.id_agence_fk = id_agence and
          id_materiel ='$barcode'");
         return $this->sendResponse($materiel,'1');
    }

    public function store(Request $request)
    {
        $token = $request->header('Authorization');
        $test = DB::table('apitoken')->where('api_token', $token)->first();
        if (is_null($test)) {
            return $this->sendError('API CODE invalide');
        }
        $input = $request ->all();
        $validator = Validator::make($input,['observation'=>'required']);
        
        if ($validator->fails()) {
           return $this->sendError('error validation', $validator->errors());
        }
        $intervention = DB::table('intervention')->insert([
            'id_materiel_fk'=> $input['id_materiel_fk'], 
            'observation'=> $input['observation'], 
            'datepb' => date("Y-m-d")
            ]);
            if (isset($input['etat']) && $input['etat'] == 'true') { //add an and condition to make sure that etat value = En Panne
                DB::table('materiel')
                ->where('id_materiel',  $input['id_materiel_fk'])
                ->update(['etat' => 'En Panne']);
            }
        return $this->sendResponse($input,'Observation added succesfully');
    }
}


