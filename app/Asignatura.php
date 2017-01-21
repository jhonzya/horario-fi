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
    return $this->hasMany("App\Busqueda", "asignatura_id");
  }

  public function grupos(){
    return $this->hasMany("App\Grupo", "asignatura_id");
  }

  public function inscripciones(){
    return $this->hasManyThrough("App\Inscripcion", "App\Grupo", "asignatura_id", "grupo_id");
  }

}
