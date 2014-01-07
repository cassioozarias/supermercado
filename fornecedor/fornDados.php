<?php
include '../menuPrincipal.php';
include '../conexao.php';

$consulta = pg_query("select * from fornecedor order by id ;")
?>
    <div class="col-md-7 float- bottom- col-lg-offset-3 ">
        <a href="fornInserir.php" class="btn btn-success">Novo Fornecedor</a>
        <table border="2" class="table table-hover" >
            <tr> 
                <th>ID</th> 
                <th>Nome</th>
                <th>CPF</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php while ($linha = pg_fetch_object($consulta)): ?>
                <tr> 
                    <td><?php echo $linha->id; ?></td>
                    <td><?php echo $linha->nome; ?></td>
                    <td><?php echo $linha->cpf; ?></td>
                    <td><?php echo "<a href='fornEditar.php?id=$linha->id&nome=$linha->nome&cpf=$linha->cpf' class='btn btn-info'>Editar</a>"; ?></td>
                    <td><?php echo "<a href='fornExcluir.php?id=$linha->id' class='btn btn-danger'>Excluir</a>"; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>