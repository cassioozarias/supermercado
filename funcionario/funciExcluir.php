<?php
include '../conexao.php';
$id = $_GET['id'];

pg_query("delete from funcionario where id = $id;");
header("Location: funciDados.php");