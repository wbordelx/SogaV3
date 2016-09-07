<?php        
include("./../controller/ProdutorCT.php");

use modelprodutor\ProdutorProperty;
if(!isset($_SESSION)) { session_start(); } 
    if(!$_SESSION['usuarioID']){
        if(basename($_SERVER["PHP_SELF"])==basename(__FILE__) )
        exit("<script>alert('Nao permitido acesso via URL - Efetue Login Novamente')</script>\n<script>window.location=('../Login.php')</script>");
    }
$paramproduto= new \modelprodutor\ProdutorProperty();

if($_GET['edit']==true){
    $produtor=new \produtor\CarregarProdutor(); 
    $objBALDados= $produtor->getProdutor();

    foreach ($objBALDados as $row){
    $paramproduto->setId($row['id']);
    $paramproduto->setCelular($row['celular']);
    $paramproduto->setCep($row['cep']);
    $paramproduto->setCidade($row['cidade']);
    $paramproduto->setData_cadastro($row['data_cadastro']);
    $paramproduto->setDtnasc($row['dtnasc']);
    $paramproduto->setEmail($row['email']);
    $paramproduto->setEndereco($row['endereco']);
    $paramproduto->setEstado($row['estado']);
    $paramproduto->setLogin($row['login']);
    $paramproduto->setNome($row['nome']);
    $paramproduto->setNumero($row['numero']);
    $paramproduto->setOxigenio($row['oxigenio']);
    $paramproduto->setPais($row['pais']);
    $paramproduto->setPh($row['ph']);
    $paramproduto->setSenha($row['senha']);
    $paramproduto->setTelefone($row['telefone']);
    }
}
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        
        <title></title>
        <link href="../Flat-UI-master/dist/css/css/style.css" rel="stylesheet" type="text/css"/>
        
        <link href='../Flat-UI-master/dist/js/flat-ui.js' rel='stylesheet' type='text/javascript'>
        <!-- Loading Bootstrap -->
        <link href="../Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Loading Flat UI -->
        <link href="../Flat-UI-master/dist/css/flat-ui.css" rel="stylesheet">
        <link rel="shortcut icon" href="../../Flat-UI-master/dist/img/favicon.ico">
   </head>
   
<body>   
	<section>
            <form action="..\controller\SalvarProdutorCT.php" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="formulario">  
                        <h2>Cadastro de Produtor</h2>
                       <form role="form" action="" method="post" id="validate">  
                           <input id="id" name="id" style='display:none;' value='<?php echo $paramproduto->getId()?>'>
                           <label>* Nome</label>
                           <input id="nome" name="nome" value='<?php echo $paramproduto->getNome()?>' type="text" class="g">

                           <label>* Nome de Login</label>
                           <input id="login" name="login" value='<?php echo $paramproduto->getLogin()?>' type="text" class="g"> 
                           
                           <label>* E-mail</label>
                           <input id="email" name="email" value='<?php echo $paramproduto->getEmail()?>' type="text" class="g">

                           <label>* Telefone</label>
                           <input id="telefone" name="telefone" value='<?php echo $paramproduto->getTelefone()?>' type="text" class="p">

                           <label>* Celular</label>
                           <input id="celular" name="celular" value='<?php echo $paramproduto->getCelular()?>' type="text" class="p">

                           <label>* Data de Nascimento</label>
                           <input name="datepicker1" type="text" value='<?php echo $paramproduto->getDtnasc()?>' class="p" id="datepicker1">                           
                           
                           <label>* CEP</label>
                           <input id="cep" name="cep" type="text" value='<?php echo $paramproduto->getCep()?>' class="p">
                       
                           <label>* Pais</label><br>
                           <select id="pais" name="pais" class="p" onchange="buscar_estado()">
                               <?php $pais=new \produtor\CarregarProdutor(); 
                                    $objBALPais= $pais->getPais();?>                         
                               <option value='<?php echo $paramproduto->getPais() ?>'>Selecione</option>
                                <?php foreach ($objBALPais as $row) { ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nome'] ?></option>
                                <?php } ?>
                            </select>
                           
                           <div id="load_estado" class="p" onchange="buscar_cidades()">
                               <input id="estado" name="estado" style='display:none;' value='<?php echo $paramproduto->getEstado()?>'>
                           </div>        
                              
                           <div id="load_cidades" class="p">
                               <input id="cidade" name="cidade" style='display:none;' value='<?php echo $paramproduto->getCidade()?>'>
                           </div>
                                                                                                            
                           <label>* Endereço(Rua,Bairro,Complemento)</label>
                           <input id="endereco" name="endereco" type="text" value='<?php echo $paramproduto->getEndereco()?>' class="g" placeholder="Bairro,Rua,Complemento" >

                           <label>* Número</label>
                           <input id="numero" name="numero" type="text" value='<?php echo $paramproduto->getNumero()?>' class="g" placeholder="Número">
                           
                           <label>* Senha de Acesso ao Sogá</label>
                           <input id="senha" name="senha" type="password" value='<?php echo $paramproduto->getSenha()?>' class="g" >
                           
                           <label>* Confirmar Senha</label>
                           <input id="consenha" name="consenha" type="password"  value='<?php echo $paramproduto->getSenha()?>' class="g" onblur="verificar_senha()" >
                           
                           
                           <label>Sensores Utilizados</label>
                           <div class="form-group">
                               <label for="checkbox5a">
                                <?php
                                     $query = pg_query("SELECT id,nome FROM sensor ORDER BY id");
                                         while($pdo = pg_fetch_array($query)){
                                             echo '<input id="sensor" name="sensor" type="checkbox"  value='.$pdo['id'].'>'.$pdo['nome'].'</input><br>';
                                         }       
                                 ?>                                                                                     
                                </label>                               
                            </div>
                           
                           <button class="button" id="enviar" > Salvar </button>

                       </form>
                    </div>
                </div>
                </form>
            </div>
        </div>        
    </section>
    
    <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../Flat-UI-master/dist/js/js/jquery.zebra-datepicker.js"></script>
    <script type="text/javascript">  
    $(document).ready(function() {
            $("#enviar").click(function() {
                var nome = $("#nome").val();
                var login = $("#login").val(); 
                var email = $("#email").val();
                var telefone = $("#telefone").val();  
                var celular = $("#celular").val();
                var dtnasc = $("#datepicker1").val();
                var cep = $("#cep").val();
                var pais = $("#pais").val();
                var estado = $("#estado").val();
                var cidade = $("#cidade").val();
                var endereco = $("#endereco").val();
                var numero = $("#numero").val();  
                var senha = $("#senha").val();   
                
                $.post('enviar.php', {nome: nome, email: email, telefone: telefone,
                                      celular: celular, dtnasc: dtnasc, cep: cep,
                                      pais: pais, estado: estado, cidade: cidade,
                                      endereco: endereco, numero: numero,senha:senha,login:login},
                function(data){
                 $("#resposta").html(data);
                 }
                 , "html");
            });
        });
        
    function buscar_cidades(){
      var estado = $('#estado').val();  //codigo do estado escolhido
      //se encontrou o estado
      if(estado){
        var url = 'Buscar_cidades.php?estado='+estado;  //caminho do arquivo php que irá buscar as cidades no BD
        $.get(url, function(dataReturn) {
          $('#load_cidades').html(dataReturn);  //coloco na div o retorno da requisicao
        });
      }
    }  
    
    function buscar_estado(){
      var pais = $('#pais').val();  //codigo do estado escolhido
      //se encontrou o estado
      if(pais){
        var url = 'Buscar_estado.php?pais='+pais;  //caminho do arquivo php que irá buscar as cidades no BD
        $.get(url, function(dataReturn) {
          $('#load_estado').html(dataReturn);  //coloco na div o retorno da requisicao
        });
      }
    }
    
    function verificar_senha(){ 
        var senha = $("#senha").val(); 
        var consenha = $("#consenha").val(); 
        if(senha != consenha){
            alert("As Senhas são Diferentes")
        }
    }
    </script>
</body>
</html>
?>
