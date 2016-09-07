<?php
//include '../conexao/dbconnect.php';
include ("./../controller/ProdutorCT.php");
use modelprodutor\ProdutorProperty;
$produtor= new modelprodutor\ProdutorProperty();

$produtor->setId($_POST['id']);
$produtor->setCelular($_POST['celular']);
$produtor->setCep($_POST['cep']);
$produtor->setCidade($_POST['cidade']);
$produtor->setDtnasc($_POST['datepicker1']);
$produtor->setEmail($_POST['email']);
$produtor->setEndereco($_POST['endereco']);
$produtor->setEstado($_POST['estado']);
$produtor->setLogin($_POST['login']);
$produtor->setNome($_POST['nome']);
$produtor->setNumero($_POST['numero']);
$produtor->setPais($_POST['pais']);
$produtor->setTelefone($_POST['telefone']);
//$produtor->setTemp_sub($_POST['temp_sub']);
//$produtor->setTemp_sup($_POST['temp_sup']);
//$produtor->setOxigenio($_POST['oxigenio']);
//$produtor->setPh($_POST['ph']);
if($_POST['senha'] == $_SESSION['usuarioSenha']){
    $produtor->setSenha($_POST['senha']);
}  else {     
    $produtor->setSenha(md5($_POST['senha']));  
}


if (!$produtor->getNome() || !$produtor->getEmail() || !$produtor->getTelefone() || !$produtor->getCelular() ||
    !$produtor->getDtnasc() || !$produtor->getCep() || !$produtor->getPais() || !$produtor->getEstado() || 
    !$produtor->getCelular() || !$produtor->getEndereco() || !$produtor->getNumero() || !$produtor->getLogin() ||
    !$produtor->getSenha()){
    print "Preencha todos os campos!"; 
    exit();
}
//Utilizando o  mysql_real_escape_string voce se protege o seu código contra SQL Injection.

use produtor\SalvarProdutor;
$salvar= new \produtor\SalvarProdutor;
$salvar->Salvar($produtor);


header("Location: ../view/DadosView.php");  

?>