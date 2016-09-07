<?php 
namespace model;
//////////////My Property Class//////////// 
// it contain getter setter function 
class DadosProperty 
{ 
        private $id_dados;
        private $identificador;
        private $temperatura_sup;
        private $temperatura_inf;
        private $ph; 
        private $oxigenio;
        private $data_dado;
        private $codigo_unico;
  
        
    public function getCodigo_unico() //Getter 
    { 
          return $this->codigo_unico; 
    } 
    public function setCodigo_unico($codigo_unico) //setter 
    { 
                $this->codigo_unico=$codigo_unico; 
    }    
   
    public function getId_dados() //Getter 
    { 
          return $this->id_dados; 
    } 
    public function setId_dados($id_dados) //setter 
    { 
                $this->id_dados=$id_dados; 
    }
    
     public function getIdentificador() //Getter 
    { 
          return $this->identificador; 
    } 
    public function setIdentificador($identificador) //setter 
    { 
                $this->identificador=$identificador; 
    }
    
     public function getTemperatura_sup() //Getter 
    { 
          return $this->temperatura_sup; 
    } 
    public function setTemperatura_sup($temperatura_sup) //setter 
    { 
                $this->temperatura_sup=$temperatura_sup; 
    }
    
     public function getTemperatura_inf() //Getter 
    { 
          return $this->temperatura_inf; 
    } 
    public function setTemperatura_inf($temperatura_inf) //setter 
    { 
                $this->temperatura_inf=$temperatura_inf; 
    }
    
     public function getPh() //Getter 
    { 
          return $this->ph; 
    } 
    public function setPh($ph) //setter 
    {       
                $this->ph = $ph; 
    }
    public function getOxigenio() //Getter 
    { 
          return $this->oxigenio; 
    } 
    public function setOxigenio($oxigenio) //setter 
    { 
                $this->oxigenio=$oxigenio; 
    }
    public function getData_dado() //Getter 
    { 
          return $this->$data_dado; 
    } 
    public function setData_dado($data_dado) //setter 
    { 
                $this->data_dado=$data_dado; 
    }

} 
//////////My Interface ///////// 
interface iDados
    { 
        function getDadosName(DadosProperty $objDadosProperty); 
    } 

?> 