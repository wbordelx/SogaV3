<?php
// Inclui o arquivo com o sistema de segurança
require_once("loginCT.php");
// Verifica se um formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Salva duas variáveis com o que foi digitado no formulário
  // Detalhe: faz uma verificação com isset() pra saber se o campo foi preenchido
  $login = (isset($_POST['login'])) ? $_POST['login'] : '';
  $senha = (isset($_POST['senha'])) ? md5($_POST['senha']) : '';
  
  if (validaUsuario($login, $senha) == true) {
    // O usuário e a senha digitados foram validados, manda pra página interna
    header("Location: ../view/DadosView.php"); 
  } else {
    // O usuário e/ou a senha são inválidos, manda de volta pro form de login
    // Para alterar o endereço da página de login, verifique o arquivo seguranca.php
    expulsaVisitante();
  }
}

