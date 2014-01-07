<?php
include '../conexao.php';
$id = $_GET['id'];

pg_query("delete from categorias where id = $id;");
header("Location: cateDados.php");