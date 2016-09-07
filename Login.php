<html>
<head>
<title> Login de Usuário </title>
    <?php session_abort();?>
    <meta charset="utf-8">
        <link href="Flat-UI-master/dist/css/css/style.css" rel="stylesheet" type="text/css"/>
        <link href='Flat-UI-master/dist/js/flat-ui.js' rel='stylesheet' type='text/javascript'>
        <!-- Loading Bootstrap -->
        <link href="Flat-UI-master/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Loading Flat UI -->
        <link href="Flat-UI-master/dist/css/flat-ui.css" rel="stylesheet">
        
    <style type="text/css">
        #loginview {
            position: relative;
            left: 40%;
            top: 40%;
        }
       #entrar{
            position: relative;
            left: 8%;
            top: 8%; 
       }
       h6{
           left: 30%;
           top: 30%;
       }
    </style> 
    </head>
    <body>
        <h6>SOGÁ:Sistema Orientado a Gestão da Água</h6>
        <div id='loginview'> 
        <form method="POST" action="controller/Valida.php">
            <label>Login .:</label>
            <input type="text" name="login" id="login"><br>
            <label>Senha:</label>
            <input type="password" name="senha" id="senha"><br>

            <input type="submit" value="entrar" id="entrar" name="entrar"><br>
        </form>
        </div>
    <script type="text/javascript" src="Flat-UI-master/dist/js/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="Flat-UI-master/dist/js/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript" src="Flat-UI-master/dist/js/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="Flat-UI-master/dist/js/js/jquery.zebra-datepicker.js"></script>
</body>
</html>