<?php

namespace App\Http\Controllers;

use App\Asignatura;
use Illuminate\Http\Request;
use Goutte\Client;
use Log;

class AsignaturaController extends Controller
{
    public function asignaturas(){
        $asignaturas = Asignatura::all();
        return response()->json($asignaturas);
    }
}
