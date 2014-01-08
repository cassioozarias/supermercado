<?php
include '../menuPrincipal.php';
include '../conexao.php';
    
$rs = $conn->prepare("SELECT p.id, p.nome, p.descricao, p.codigo, p.preco, c.nome as categoria
from produto p
inner join categorias c on (p.categoria = c.id)
order by p.id;");
$rs->execute();
?>
<div class="col-md-7 float- bottom- col-lg-offset-3 ">
    <a href="prodInserir.php" class="btn btn-success">Novo Produto</a>
    <table border="2" class="table table-hover" >
        <tr> 
            <th>ID</th> 
            <th>Nome</th>
            <th>Descrição</th>
            <th>Codigo</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
        <?php while ($linha = $rs->fetch(PDO::FETCH_OBJ)): ?>
            <tr> 
                <td><?php echo $linha->id; ?></td>
                <td><?php echo $linha->nome; ?></td>
                <td><?php echo $linha->descricao; ?></td>
                <td><?php echo $linha->codigo; ?></td>
                <td><?php echo $linha->preco; ?></td>
                <td><?php echo $linha->categoria; ?></td>
                <td><?php echo "<a href='prodEditar.php?id=$linha->id&nome=$linha->nome&descricao=$linha->descricao&codigo=$linha->codigo&preco=$linha->preco&categoria=$linha->categoria' class='btn btn-info'>Editar</a>"; ?></td>
                <td><?php echo "<a href='prodExcluir.php?id=$linha->id' class='btn btn-danger'>Excluir</a>"; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>