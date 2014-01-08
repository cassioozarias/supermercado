<?php
include '../menuPrincipal.php';
include '../conexao.php';

$consulta =$conn->prepare("SELECT * from usuario order by id;");
$consulta->execute();
?>
<div class="col-md-7 float- bottom- col-lg-offset-3 ">
    <a href="usuaInserir.php" class="btn btn-success">Novo Usuario</a>
    <table border="2" class="table table-hover" >
        <tr> 
            <th>ID</th> 
            <th>Login</th>
            <th>Senha</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)): ?>
            <tr> 
                <td><?php echo $linha->id; ?></td>
                <td><?php echo $linha->login; ?></td>
                <td><?php echo $linha->senha; ?></td>
                <td><?php echo "<a href='usuaEditar.php?id=$linha->id&login=$linha->login&senha=$linha->senha' class='btn btn-info'>Editar</a>"; ?></td>
                <td><?php echo "<a href='usuaExcluir.php?id=$linha->id' class='btn btn-danger'>Excluir</a>"; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>