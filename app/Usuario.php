<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
  protected $table = "usuario";
  protected $fillable = ["avatar", "correo", "invitado", "nombre", "token"];
  protected $hidden = ["created_at", "updated_at"];


  //  Relaciones

  public function busquedas(){
    return $this->hasMany("App\Busqueda", "usuario_id");
  }

  public function grupos(){
    return $this->belongsToMany("App\Grupo", "inscripcion", "usuario_id", "grupo_id")
      ->withPivot(["color"]);
  }

  public function inscripciones(){
    return $this->hasMany("App\Inscripcion", "usuario_id");
  }

}
