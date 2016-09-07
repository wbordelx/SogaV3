<?php
namespace modelprodutor;

class ProdutorProperty 
{ 
  private $id;
  private $nome;
  private $telefone;
  private $email;
  private $data_cadastro;
  private $celular;
  private $dtnasc;
  private $cep;
  private $pais;
  private $estado;
  private $cidade;
  private $endereco;
  private $numero;
  private $temp_sup;
  private $temp_sub;
  private $ph;
  private $oxigenio;
  private $login;
  private $senha;

  public function getId() //Getter 
  { 
      return $this->id; 
  } 
  public function setId($id) //setter 
  { 
      $this->id=$id; 
  }
 
  public function getNome() //Getter 
  { 
      return $this->nome; 
  } 
  public function setNome($nome) //setter 
  { 
      $this->nome=$nome; 
  }
  
  public function getTelefone() //Getter 
  { 
      return $this->telefone; 
  } 
  public function setTelefone($telefone) //setter 
  { 
      $this->telefone=$telefone; 
  }
  
  public function getEmail() //Getter 
  { 
      return $this->email; 
  } 
  public function setEmail($email) //setter 
  { 
      $this->email=$email; 
  }
  
  public function getData_cadastro() //Getter 
  { 
      return $this->data_cadastro; 
  } 
  public function setData_cadastro($data_cadastro) //setter 
  { 
      $this->data_cadastro=$data_cadastro; 
  }
  public function getCelular() //Getter 
  { 
      return $this->celular; 
  } 
  public function setCelular($celular) //setter 
  { 
      $this->celular=$celular; 
  }
  
  public function getDtnasc() //Getter 
  { 
      return $this->dtnasc; 
  } 
  public function setDtnasc($dtnasc) //setter 
  { 
      $this->dtnasc=$dtnasc; 
  }
  
  public function getCep() //Getter 
  { 
      return $this->cep; 
  } 
  public function setCep($cep) //setter 
  { 
      $this->cep=$cep; 
  }

  public function getPais() //Getter 
  { 
      return $this->pais; 
  } 
  public function setPais($pais) //setter 
  { 
      $this->pais=$pais; 
  }
  
  public function getEstado() //Getter 
  { 
      return $this->estado; 
  } 
  public function setEstado($estado) //setter 
  { 
      $this->estado=$estado; 
  }

  public function getCidade() //Getter 
  { 
      return $this->cidade; 
  } 
  public function setCidade($cidade) //setter 
  { 
      $this->cidade=$cidade; 
  }

  public function getEndereco() //Getter 
  { 
      return $this->endereco; 
  } 
  public function setEndereco($endereco) //setter 
  { 
      $this->endereco=$endereco; 
  }

  public function getNumero() //Getter 
  { 
      return $this->numero; 
  } 
  public function setNumero($numero) //setter 
  { 
      $this->numero=$numero; 
  }
  
  public function getTemp_sup() //Getter 
  { 
      return $this->temp_sup; 
  } 
  public function setTemp_sup($temp_sup) //setter 
  { 
      $this->temp_sup=$temp_sup; 
  }

  public function getTemp_sub() //Getter 
  { 
      return $this->temp_sub; 
  } 
  public function setTemp_sub($temp_sub) //setter 
  { 
      $this->temp_sub=$temp_sub; 
  }

  public function getPh() //Getter 
  { 
      return $this->ph; 
  } 
  public function setPh($ph) //setter 
  { 
      $this->ph=$ph; 
  }
  
  public function getOxigenio() //Getter 
  { 
      return $this->oxigenio; 
  } 
  public function setOxigenio($oxigenio) //setter 
  { 
      $this->oxigenio=$oxigenio; 
  }
 
  public function getLogin() //Getter 
  { 
      return $this->login; 
  } 
  public function setLogin($login) //setter 
  { 
      $this->login=$login; 
  }

  public function getSenha() //Getter 
  { 
      return $this->senha; 
  } 
  public function setSenha($senha) //setter 
  { 
      $this->senha=$senha; 
  }
}

interface iProdutor
    { 
        function getProdutor(ProdutorProperty $objProdutorProperty); 
    } 
 ?>
