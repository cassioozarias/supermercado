<?php
include './conexao.php';
$login = $_POST['login'];
$senha = $_POST['senha'];

if ($login && $senha) {
    $consulta = $conn->prepare("SELECT * from usuario");
    $consulta->execute();
while ($linha = $consulta->fetch(PDO::FETCH_OBJ)){
        if ($linha->login == $login && $linha->senha == $senha) {
            session_start();
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
        }
    }
    if ($_SESSION['login'] && $_SESSION['senha']) {
        header("Location: home.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tela de login</title>
        <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
        <meta charset="utf-8"/> 
    </head>
    <body>
        <div class="col-lg-8">
            <div class="col-md-10">
                <form class="form-horizontal col-md-10 col-lg-8 col-sm-5 col-md-8 float- bottom- col-lg-offset-3" method="POST">
                    <fieldset>  
                        <legend>Faça seu Login</legend>
                        <div class="alert-info">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Login:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="login" placeholder="Digite Seu Login" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Senha:</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="senha" placeholder="Digite seu Senha" >
                                </div>
                            </div>
                        </div>
                        <label><input type="submit" class="btn btn-info" value="conectar"/></label>
                    </fieldset>
                </form>
            </div>
        </div>      
    </body>
</html>