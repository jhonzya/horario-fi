<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Validator;
use JWTAuth;
use Log;

class AuthController extends Controller
{

    public function save(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'token' => 'required',
            'nombre' => 'required',
            'invitado' => 'required'
        ]);

        if($validate->fails())
            return response()->json(['error' => $validate->errors()->first()]);

        $usuario = Usuario::updateOrCreate(['token' => $request->token], $request->all());
        $token = JWTAuth::fromUser($usuario);
        return response()->json(compact('token'));

    }

    public function user(Request $request)
    {
        return response()->json(['usuario' => $request->user()]);
    }

}
