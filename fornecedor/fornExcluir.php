<?php
include '../conexao.php';
$id = $_GET['id'];


try {
    $stmt = $conn->prepare('DELETE FROM fornecedor WHERE id =:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: fornDados.php");
} catch (PDOException $e) {
    echo 'Error:' . $e->getMessage();
}