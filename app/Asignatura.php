<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
  protected $table = "asignatura";
  protected $fillable = ["clave", "nombre", "tipo"];
  protected $hidden = ["created_at", "updated_at"];

  
  //  Relaciones

  public function busquedas(){
    return $this->hasMany("Busqueda", "asignatura_id")
      ->where("semestre_id", env("SEMESTRE_ACTUAL"));
  }

  public function grupos(){
    return $this->hasMany("Grupo", "asignatura_id")
      ->where("semestre_id", env("SEMESTRE_ACTUAL"));
  }

  public function inscripciones(){
    return $this->hasManyThrough("Inscripcion", "Grupo", "asignatura_id", "grupo_id")
      ->where("semestre_id", env("SEMESTRE_ACTUAL"));
  }

}
