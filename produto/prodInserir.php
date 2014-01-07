<?php
include '../menuPrincipal.php';
include '../conexao.php';
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$codigo = $_POST['codigo'];
$categoria = $_POST['categoria'];

if ($nome && $descricao) {
    pg_query("insert into produto(nome,descricao,codigo,categoria)values('$nome','$descricao','$codigo','$categoria')");
    header("location: prodDados.php");
}

$consulta = pg_query("SELECT * from categorias");
?>
<div class="col-md-6">
    <form class="form-horizontal" role="form" method="POST" name="frmcadastro">
        <fieldset>
            <legend>Dados de Produtos</legend>
            <div class="alert-info">
                    <div class="form-group">
                        <label for="inputnome2" class="col-sm-2 control-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="col-lg-10" id="inputome2"  placeholder="Digite o nome do produto" required>
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label for="inputdescricao3" class="col-sm-2 control-label">Descrição:</label>
                        <div class="col-sm-10">
                            <input type="text" name="descricao" class="col-lg-10" id="inputDescricao3" placeholder="Digite a discrição" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputcodigo3" class="col-sm-2 control-label">Código:</label>
                        <div class="col-sm-10">
                            <input type="text" name="codigo" class="col-lg-10" id="inputDescricao3" placeholder="Digite o código" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputcodigo3" class="col-sm-2 control-label">Categoria:</label>
                        <div class="col-sm-10">
                            <select name="categoria">
                                <?php while ($linha = pg_fetch_object($consulta)): ?>
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