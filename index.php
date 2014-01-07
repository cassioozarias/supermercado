<?php
include './conexao.php';
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

if ($nome && $cpf) {
    $consulta = pg_query("SELECT * from funcionario ;");
    while ($linha = pg_fetch_object($consulta)) {
        $linha->nome;
        $linha->cpf;
        if ($linha->nome == $nome && $linha->cpf == $cpf) {
            session_start();
            $_SESSION['nome'] = $nome;
            $_SESSION['cpf'] = $cpf;
        }
    }
    if ($_SESSION['nome'] && $_SESSION['cpf']) {
        header("Location: home.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Tela de login</title>
        <link rel="stylesheet"  type="text/css" href="sair.css" />
        <link rel="stylesheet" type="text/css"  href="css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css"  href="css/bootstrap-theme.min.css" />
        <link rel="stylesheet" type="text/css"  href="menu_principal.css"/>
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
                                <label class="col-sm-2 control-label">Nome:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputLoginl3" name="nome" placeholder="Digite Seu Nome" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">CPF:</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="inputPassword3" name="cpf" placeholder="Digite seu CPF" required>
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