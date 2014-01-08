<?php
include '../menuPrincipal.php';
include '../conexao.php';
if ($_SESSION['permitido'] != 1){
    header("Location: ../index.php");
}

$consulta =$conn->prepare("SELECT * from funcao order by id;");
$consulta->execute();
?>

<div class="col-md-7 float- bottom- col-lg-offset-3 ">
    <a href="funcInserir.php" class="btn btn-success">Nova Função</a>
    <table border="2" class="table table-hover" >
        <tr>  
            <th>ID</th>
            <th>Função</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)): ?>
            <tr> 
                <td><?php echo $linha->id; ?></td>
                <td><?php echo $linha->nome; ?></td>
                <td><?php echo "<a href='funcEditar.php?id=$linha->id&nome=$linha->nome' class='btn btn-info'>Editar</a>"; ?></td>
                <td><?php echo "<a href='funcExcluir.php?id=$linha->id' class='btn btn-danger'>Excluir</a>"; ?></td>       
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>