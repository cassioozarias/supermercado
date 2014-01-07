<?php
include '../conexao.php';
$id = $_GET['id'];

pg_query("delete from funcao where id = $id;");
header("Location: funcDados.php");