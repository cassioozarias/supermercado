<?php
session_start();
if (!$_SESSION['login'] && !$_SESSION['senha']) {
    header("Location: ../index.php");
}
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
            <?php if ($_SESSION['permitido'] == 1): ?>
            <li><a href="../fornecedor/fornDados.php">Fornecedor</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['permitido'] == 1): ?>
            <li><a href="../funcionario/funciDados.php">Funcinário</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['permitido'] == 1): ?>
                <li><a href="../usuario/usuaDados.php">Usuário</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['permitido'] == 1): ?>
                <li><a href="../categoria/cateDados.php">Categoria</a></li>
            <?php endif; ?>
            <?php if ($_SESSION['permitido'] == 1): ?>
                <li><a href="../funcao/funcDados.php">Função</a></li>
            <?php endif; ?>    
            <li><a href="../sair.php">Sair</a></li>
        </ul><br>