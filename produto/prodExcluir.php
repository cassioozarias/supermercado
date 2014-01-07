<?php
include '../conexao.php';
$id = $_GET['id'];

pg_query("delete from produto where id = $id;");
header("Location: prodDados.php");