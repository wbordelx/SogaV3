<?php
include('ProdutorCT.php');
session_start();
function validaUsuario($login, $senha) {
  global $_SG;
  $cS = ($_SG['caseSensitive']) ? 'BINARY' : '';
  // Usa a função addslashes para escapar as aspas
  $nusuario = addslashes($login);
  $nsenha = addslashes($senha);
  
  $rlogin=new \produtor\CarregarProdutor(); 
  $resultado= $rlogin->login($nusuario,$nsenha,$cS);
 
 
  // Verifica se encontrou algum registro
  if (empty($resultado)) {
       echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='../Login.php';</script>";
       die();
    
      //header("Location: ../login.php"); 
    return false;
  } else {
    foreach ($resultado as $row)  {
        // Definimos dois valores na sessão com os dados do usuário
        $_SESSION['usuarioID'] = $row['id']; // Pega o valor da coluna 'id do registro encontrado no MySQL
        $_SESSION['usuarioNome'] = $row['nome']; // Pega o valor da coluna 'nome' do registro encontrado no MySQL
        $_SESSION['usuarioSenha'] = $senha;
        $_SESSION['usuarioLogin'] = $login;
        // Verifica a opção se sempre validar o login
        return true;
    }
  }
}
/**
* Função que protege uma página
*/
function protegePagina() {
  global $_SG;
  if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
    // Não há usuário logado, manda pra página de login
    expulsaVisitante();
  } else if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
    // Há usuário logado, verifica se precisa validar o login novamente
    if ($_SG['validaSempre'] == true) {
      // Verifica se os dados salvos na sessão batem com os dados do banco de dados
      if (!validaUsuario($_SESSION['usuarioLogin'], $_SESSION['usuarioSenha'])) {
        // Os dados não batem, manda pra tela de login
        expulsaVisitante();
      }
    }
  }
}
/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
  global $_SG;
  // Remove as variáveis da sessão (caso elas existam)
  unset($_SESSION['usuarioID'], $_SESSION['usuarioNome'], $_SESSION['usuarioLogin'], $_SESSION['usuarioSenha']);
  // Manda pra tela de login
  header("Location: ../view/DadosView.php"); 
}