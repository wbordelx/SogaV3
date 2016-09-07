<?php

namespace modelsensor;

class SensorProperty 
{ 
  private $id;
  private $id_produtor;
  private $codigo_unico;
  
   public function getId() //Getter 
  { 
      return $this->id; 
  } 
  public function setId($id) //setter 
  { 
      $this->id=$id; 
  }
   public function getId_produtor() //Getter 
  { 
      return $this->id_produtor; 
  } 
  public function setId_produtor($id_produtor) //setter 
  { 
      $this->id_produtor=$id_produtor; 
  }
   public function getCodigo_unico() //Getter 
  { 
      return $this->codigo_unico; 
  } 
  public function setCodigo_unico($codigo_unico) //setter 
  { 
      $this->codigo_unico=$codigo_unico; 
  }
}

interface iSensor
    { 
        function getSensor(SensorProperty $objSensorProperty); 
    } 
 ?>