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
         $CodeSession = DB::table('session')->where('code_session', $sessioncode)->first();

         if (is_null($CodeSession)) {
            return $this->sendError('0'); //0 mean the Sessioncode not found
         }

         return $this->sendResponse($CodeSession,'1');
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
        'id_session_fk' => 'required',
        ] );

        if ($validator -> fails()) {
            return $this->sendError('error validation', $validator->errors());
        }
        DB::table('materiel')
            ->where('id_materiel',  $input['codebar'])
            ->update(['etat' => $input['etat']]);
            $infosession = DB::table('infosession')->insert([
                'id_session_fk'=> $input['id_session_fk'], 
                'id_materiel_fk'=> $input['codebar']
                ]);
        return $this->sendResponse($input, 'Etat  updated succesfully');
    
}
}


