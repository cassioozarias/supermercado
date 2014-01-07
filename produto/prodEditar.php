<?php
include '../menuPrincipal.php';
include '../conexao.php';
$id = $_GET['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$codigo = $_POST['codigo'];
$categoria = $_POST['categoria'];
$categoriaOrde = $_GET['categoria'];

if ($nome && $descricao) {

    try {
        $stmt = $conn->prepare('INSERT INTO produto(nome,descricao,codigo,categoria)VALUES(:nome, :descricao, :codigo, :categoria)');
        $stmt->execute(array(
            ':nome' => $nome,
            ':descricao' => $descricao,
            ':codigo' => $codigo,
            ':categoria' => $categoria,
        ));
        header("Location: prodDados.php");
    } catch (Exception $e) {
        echo 'Error:' . $e->getMessage();
    }
}
$consulta = $conn->prepare("SELECT * FROM categorias order by nome = '$categoriaOrde' desc;");
$consulta->execute();
?>
<div class="col-md-6">
    <form class="form-horizontal" role="form" method="POST" name="frmcadastro">
        <fieldset>
            <legend>Dados de Produtos</legend>
            <div class="alert-info">
                <div class="form-group">
                    <label for="inputnome2" class="col-sm-2 control-label">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" name="nome" class="col-lg-10" id="inputome2"  placeholder="Digite o nome do produto" required value="<?php echo $_GET['nome']; ?>">
                    </div>
                </div>                   
                <div class="form-group">
                    <label for="inputdescricao3" class="col-sm-2 control-label">Descrição:</label>
                    <div class="col-sm-10">
                        <input type="text" name="descricao" class="col-lg-10" id="inputDescricao3" placeholder="Digite a discrição" required value="<?php echo $_GET['descricao']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputcodigo3" class="col-sm-2 control-label">Código:</label>
                    <div class="col-sm-10">
                        <input type="text" name="codigo" class="col-lg-10" id="inputDescricao3" placeholder="Digite o código" required value="<?php echo $_GET['codigo']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputcodigo3" class="col-sm-2 control-label">Categoria:</label>
                    <div class="col-sm-10">
                        <select name="categoria">
                            <?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)): ?>
                                <option value="<?php echo $linha->id; ?>"><?php echo $linha->nome; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-info" name="password" value="enviar" />
            <a href="prodDados.php"><input type="submit" class="btn btn-info" name="password" value="voltar"/></a>
        </fieldset>          
    </form> 
</div>  
</body>
</html>