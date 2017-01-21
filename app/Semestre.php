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
    return $this->hasMany("App\Busqueda", "semestre_id");
  }

  public function grupos(){
    return $this->hasMany("App\Grupo", "semestre_id");
  }
  
}
