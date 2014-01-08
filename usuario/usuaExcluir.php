<?php

include '../conexao.php';
$id = $_GET['id'];

try {
    $stmt = $conn->prepare('DELETE FROM usuario WHERE id =:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: usuaDados.php");
} catch (PDOException $e) {
    echo 'Error:' . $e->getMessage();
}