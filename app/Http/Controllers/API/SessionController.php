<?php


namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\BaseController as BaseController;

use Validator;
use App\Materiel;


class SessionController extends BaseController 
{
    public function show(Request $request,$sessioncode)
    {
        $token = $request->header('Authorization');
        $test = DB::table('apitoken')->where('api_token', $token)->first();
        if (is_null($test)) {
            return $this->sendError('API CODE invalide');
        }
        //$CodeSession = DB::table('session')->where('code_session', $sessioncode)->first();
        $CodeSession =  DB::select("select code_session from
        session where code_session ='$sessioncode' and 
        ((select id_session from session where code_session ='$sessioncode') in 
        (select max(id_session) from session))");

         if (is_null($CodeSession)) {
            return $this->sendError('0'); //0 mean the Sessioncode not found
         }
         $id_session = DB::select("select id_session from session where
          code_session = '$sessioncode'");
         return $this->sendResponse($CodeSession,$id_session);
    }

    public function update(Request $request ) //using post method
{
        $token = $request->header('Authorization');
            $test = DB::table('apitoken')->where('api_token', $token)->first();
            if (is_null($test)) {
                return $this->sendError('API CODE invalide');
            }
        $input = $request->all();
        $validator =  Validator::make($input, [
        'codebar'=> 'required',
        'etat'=> 'required',
        'utilisateur'=>'required',
        'codesession' => 'required',
        ] );

        if ($validator -> fails()) {
            return $this->sendError('Error Validation : ', $validator->errors());
        }
        $codes = $input['codesession'];
        $IdSess = DB::table('session')->select('id_session')->
        where('code_session', $codes)->pluck('id_session');
        $IdSessInt = (int) preg_replace("/[^0-9]/", '', $IdSess);
        $etat = $input['etat'];
        $codebar = $input['codebar'];
        $utilisateur = $input['utilisateur'];
        DB::update("update  materiel
        set etat = '$etat', id_utilisateur = '$utilisateur'
        where id_materiel = '$codebar' ");
        
            $infosession = DB::table('infosession')->insert([
                'id_session_fk'=> $IdSessInt, 
                'id_materiel_fk'=> $input['codebar']
                ]);
        return $this->sendResponse($input, 'Etat  updated succesfully');
    
}
}


