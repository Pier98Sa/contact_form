<?php

namespace App\Http\Controllers\Api;

use App\DatabaseJson\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
        //richiamo i dati inviati dal front
       $data = $request->all();

       //eseguo le validazioni
       $validator = Validator::make($data,[
        "name" => 'required|max:50',
        "surname" => 'required|max:100',
        "email" => 'required|email|max:100'
       ]);

       if($validator->fails()){
        //Se la validazione non va a buon fine ritorno gli errori
        return response()->json([
            'errors' => $validator->errors(),
            'success' => false
        ]);
        }else{
            //Se la validazione va a buon fine aggiungo i dati nel DB e ritorno un json 

            $user = new User();
            $user->name = $data["name"];
            $user->surname = $data["surname"];
            $user->email = $data["email"];
            $user->save();

            return response()->json([
                'success' => true
            ]);
            
        }

    }

}
