<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
  protected $table = "grupo";
  protected $fillable = ["grupo", "profesor", "inicio", "fin", "asignatura_id", "semestre_id",
    "lunes", "martes", "miercoles", "jueves", "viernes", "sabado"];
  protected $hidden = ["created_at", "updated_at"];
  protected $appends = ["eventos"];


  //  Relaciones
  
  public function asignatura(){
    return $this->belongsTo("Asignatura", "asignatura_id");
  }

  public function inscripciones(){
    return $this->hasMany("Inscripcion", "grupo_id");
  }

  public function semestre(){
    return $this->belongsTo("Semestre", "semestre_id");
  }

  public function usuarios(){
    return $this->belongsToMany("Usuario", "inscripcion", "grupo_id", "usuario_id");
  }


  // Extras

  public function getEventosAttribute(){
    $dias = array();
    if($this->lunes){
      array_push($dias, [
        "inicio" => date( "Y-m-d", strtotime( "monday this week" ) )." ".$this->inicio,
        "fin" => date( "Y-m-d", strtotime( "monday this week" ) )." ".$this->fin
      ]);
    }

    if($this->martes){
      array_push($dias, [
        "inicio" => date( "Y-m-d", strtotime( "tuesday this week" ) )." ".$this->inicio,
        "fin" => date( "Y-m-d", strtotime( "tuesday this week" ) )." ".$this->fin
      ]);
    }

    if($this->miercoles){
      array_push($dias, [
        "inicio" => date( "Y-m-d", strtotime( "wednesday this week" ) )." ".$this->inicio,
        "fin" => date( "Y-m-d", strtotime( "wednesday this week" ) )." ".$this->fin
      ]);
    }

    if($this->jueves){
      array_push($dias, [
        "inicio" => date( "Y-m-d", strtotime( "thursday this week" ) )." ".$this->inicio,
        "fin" => date( "Y-m-d", strtotime( "thursday this week" ) )." ".$this->fin
      ]);
    }

    if($this->viernes){
      array_push($dias, [
        "inicio" => date( "Y-m-d", strtotime( "friday this week" ) )." ".$this->inicio,
        "fin" => date( "Y-m-d", strtotime( "friday this week" ) )." ".$this->fin
      ]);
    }

    if($this->sabado){
      array_push($dias, [
        "inicio" => date( "Y-m-d", strtotime( "saturday this week" ) )." ".$this->inicio,
        "fin" => date( "Y-m-d", strtotime( "saturday this week" ) )." ".$this->fin
      ]);
    }

    return $dias;
  }

}

