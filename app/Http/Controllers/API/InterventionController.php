<?php
//I should make a model for materiel table to check by id_materiel

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;

use App\Intervention;
use Validator;


class InterventionController extends BaseController 
{
    public function index()
    {
         
    }

    public function store(Request $request)
    {
        $input = $request ->all();
        $validator = Validator::make($input,['observation'=>'required']);
        
        if ($validator->fails()) {
           return $this->sendError('error validation', $validator->errors());
        }
        $intervention = Intervention::create($input);
        return $this->sendResponse($input->toArray(),'Observation added succesfully');
    }
}


