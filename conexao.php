<?php

$servidor = "localhost";
$dbname   = "supermercado";
$usuario  = "supermercado";
$senha    = "supermercado";

try {
    $conn = new PDO("pgsql:dbname=$dbname; host=$servidor","$usuario","$senha");
} catch (Exception $exc) {
  echo $exc->getMessage();
}