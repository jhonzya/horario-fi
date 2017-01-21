<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Grupo;
use App\Inscripcion;
use Illuminate\Http\Request;
use Goutte\Client;
use Log;

class AsignaturaController extends Controller
{

    private $url = "http://inscripciones.ingenieria.unam.mx/consulta_horarios/index.php/horarios/consulta/";

    public function asignaturas(){
        $asignaturas = Asignatura::all();
        return response()->json($asignaturas);
    }

    public function buscar(Request $request){
        $asignatura = Asignatura::find($request->id);
        $grupos = $this->crawler($asignatura->clave);

        return response()->json($grupos);
    }

    public function inscribir(Request $request){
        // Actualiza la Asignatura
        $asignatura = Asignatura::updateOrCreate(
            ['clave' => $request->CLAVE, 'tipo' => $request->TIPO],
            ['nombre' => $request->ASIGNATURA]
        );

        $colores = [
          'e53935', 'd81b60', '8e24aa', '5e35b1', '3949ab', '1e88e5', '039be5', '00acc1',
          '00897b', '43a047', '7cb342', 'c0ca33', 'fdd835', 'ffb300', 'fb8c00', 'f4511e'
        ];
        $array_key = array_rand($colores, 1);

        $grupos = Grupo::where([
            ['grupo', $request->GRUPO],
            ['asignatura_id', $asignatura->id]
        ])->get();

        $inscripciones = [];
        foreach ($grupos as $grupo){
            Inscripcion::updateOrCreate(
              ["grupo_id" => $grupo->id, "usuario_id" => $request->user()->id],
              ["color" => $colores[$array_key]]
            );
            $inscripciones[] = $grupo->id;
        }

        $grupos = $request->user()
          ->grupos()->whereIn("grupo.id", $inscripciones)->with("asignatura")
          ->get();
        
        return response()->json($grupos);
    }

    private function crawler($clave){
        $cliente = new Client();
        $crawler = $cliente->request("GET", $this->url.$clave);

        $headers = $crawler->filter("table > tr > th")->each(function ($nodo) {
            return $this->normalize($nodo->text());
        });

        $grupos = $crawler->filter("table > tr")->each(function ($nodo) use ($headers){
            $grupo = $nodo->filter("td")->each(function ($td){
                return $td->text();
            });

            if(count($headers) == count($grupo))
                return array_combine($headers, $grupo);
        });

        return array_values(array_filter($grupos));
    }

    private function normalize($str){
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
          'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
          'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
          'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
          'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', '%' => 'porcentaje', '(' => '_', ')' => '_', '&Eacute' => 'E');
        $str =  strtr( $str, $unwanted_array );
        $str = str_replace(" ", "_", $str);
        $str = strtoupper($str);
        return $str;
    }
}
