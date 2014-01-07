<?php

$servidor = "127.0.0.1";
$port     = "5432";
$dbname   = "supermercado";
$usuario  = "supermercado";
$senha    = "supermercado";

$conexao  = pg_connect("host=$servidor port= $port dbname= $dbname user= $usuario password= $senha") or die("Erro ao conectar no banco");



?>
