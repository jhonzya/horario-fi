<?php

use Illuminate\Database\Seeder;
use App\Asignatura;
use App\Semestre;
use App\Grupo;


class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $semestre = Semestre::firstOrCreate(['nombre' => env('SEMESTRE_ACTUAL')]);

        foreach (file('database/'.env('SEMESTRE_ACTUAL')) as $dato) {
            $materia = explode('#', $dato);
            $nombre = str_replace("\n", "", $materia[2]);

            $asignatura = Asignatura::firstOrCreate([
                'nombre'  =>  trim($nombre),
                'clave' => $materia[1],
                'tipo' => trim($materia[3])
            ]);

            Grupo::firstOrCreate([
                'grupo' => trim($materia[4]),
                'asignatura_id' => $asignatura->id,
                'semestre_id' => $semestre->id,
                'profesor' => trim($materia[5]),
                'inicio' => trim($materia[6]).'00',
                'fin' => trim($materia[7]).'00',
                'lunes' => trim($materia[8]) ? true : false,
                'martes' => trim($materia[9]) ? true : false,
                'miercoles' => trim($materia[10]) ? true : false,
                'jueves' => trim($materia[11]) ? true : false,
                'viernes' => trim($materia[12]) ? true : false,
                'sabado' => trim($materia[13]) ? true : false
            ]);

        }
    }
}
