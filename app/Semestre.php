<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
  protected $table = "semestre";
  protected $fillable = ["nombre"];
  protected $hidden = ["created_at", "updated_at"];


  //  Relaciones

  public function busquedas(){
    return $this->hasMany("Busqueda", "semestre_id")
      ->where("semestre_id", env("SEMESTRE_ACTUAL"));
  }

  public function grupos(){
    return $this->hasMany("Grupo", "semestre_id")
      ->where("semestre_id", env("SEMESTRE_ACTUAL"));
  }
  
}
