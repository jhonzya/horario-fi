<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
  protected $table = "usuario";
  protected $fillable = ["avatar", "correo", "invitado", "nombre", "token"];
  protected $hidden = ["created_at", "updated_at"];


  //  Relaciones

  public function busquedas(){
    return $this->hasMany("Busqueda", "usuario_id");
  }

  public function busquedas_semestre(){
    return $this->hasMany("Busqueda", "usuario_id")
      ->where("busqueda.semestre_id", env("SEMESTRE_ACTUAL"));
  }

  public function grupos(){
    return $this->belongsToMany("Grupo", "inscripcion", "usuario_id", "grupo_id")
      ->where("semestre_id", env("SEMESTRE_ACTUAL"))->withPivot(["color"]);
  }

  public function inscripciones(){
    return $this->hasMany("Inscripcion", "usuario_id");
  }

}
