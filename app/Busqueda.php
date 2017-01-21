<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Busqueda extends Model
{
  protected $table = "busqueda";
  protected $fillable = ["asignatura_id", "semestre_id", "usuario_id"];
  protected $hidden = ["created_at", "updated_at"];


  //  Relaciones

  public function asignatura(){
    return $this->belongsTo("App\Asignatura", "asignatura_id");
  }

  public function semestre(){
    return $this->belongsTo("App\Semestre", "semestre_id");
  }

  public function usuario(){
    return $this->belongsTo("App\Usuario", "usuario_id");
  }
  
}
