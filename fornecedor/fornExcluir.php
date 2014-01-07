<?php
include '../conexao.php';
$id = $_GET['id'];

pg_query("delete from fornecedor where id = $id;");
header("Location: fornDados.php");