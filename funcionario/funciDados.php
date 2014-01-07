<?php
include '../menuPrincipal.php';
include '../conexao.php';

$consulta = pg_query("SELECT p.id, p.nome, p.cpf, c.nome as funcao
from funcionario p
inner join funcao c on (p.funcao = c.id)
order by p.id;")
?>
    <div class="col-md-7 float- bottom- col-lg-offset-3 ">
        <a href="funciInserir.php" class="btn btn-success">Novo Funcionario</a>
        <table border="2" class="table table-hover" >
            <tr>  
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Função</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php while ($linha = pg_fetch_object($consulta)): ?>
                <tr> 
                    <td><?php echo $linha->id; ?></td>
                    <td><?php echo $linha->nome; ?></td>
                    <td><?php echo $linha->cpf; ?></td>
                    <td><?php echo $linha->funcao; ?></td>
                    <td><?php echo "<a href='funciEditar.php?id=$linha->id&nome=$linha->nome&cpf=$linha->cpf&funcao=$linha->funcao' class='btn btn-info'>Editar</a>"; ?></td>
                    <td><?php echo "<a href='funciExcluir.php?id=$linha->id' class='btn btn-danger'>Excluir</a>"; ?></td>       
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>