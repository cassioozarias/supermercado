<?php
//session_start();
//if (!$_SESSION['nome'] && !$_SESSION['cpf']) {
//    header("Location: index.php");
//}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>pagina de entrada</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/bootstrap-theme.min.css" />
    </head>
    <body>
        <ul class="nav nav-pills navbar-inverse">
            <li class="dropdwn"><a href="../home.php">Home</a></li>
            <li><a href="../produto/prodDados.php">Produto</a></li>
            <li><a href="../fornecedor/fornDados.php">Fornecedor</a></li>
            <li><a href="../funcionario/funciDados.php">Funcinário</a></li>
            <li><a href="../categoria/cateDados.php">Categoria</a></li>
            <li><a href="../funcao/funcDados.php">Função</a></li>
            <li><a href="../sair.php">Sair</a></li>
        </ul><br>