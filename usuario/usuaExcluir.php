<?php

include '../conexao.php';
if ($_SESSION['permitido'] != 1){
    header("Location: ../index.php");
}
$id = $_GET['id'];

try {
    $stmt = $conn->prepare('DELETE FROM usuario WHERE id =:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: usuaDados.php");
} catch (PDOException $e) {
    echo 'Error:' . $e->getMessage();
}