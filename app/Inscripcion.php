<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
  protected $table = "inscripcion";
  protected $fillable = ["color", "grupo_id", "usuario_id"];
  protected $hidden = ["created_at", "updated_at"];


  //  Relaciones
  
  public function grupo(){
    return $this->belongsTo("App\Grupo", "grupo_id");
  }

}
