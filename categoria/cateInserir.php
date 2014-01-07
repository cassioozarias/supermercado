<?php
include '../menuPrincipal.php';
include '../conexao.php';
$nome = $_POST['nome'];

if ($nome) {
    pg_query("insert into categorias(nome)values('$nome')");
    header("location: cateDados.php");
}
?>
<div class="col-md-6">
    <form class="form-horizontal" role="form" method="POST" name="frmcadastro">
        <fieldset>
            <legend>Dados de Categorias</legend>
            <div class="alert-info">
                    <div class="form-group">
                        <label for="inputnome1" class="col-sm-2 control-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="col-lg-10" id="inputNome2"  placeholder="Digite o nome da categoria" required>
                        </div>
                    </div>
                </div>       
                <input type="submit" class="btn btn-info" name="password" value="enviar" />
                <a href="cateDados.php"><input type="submit" class="btn btn-info" name="password" value="voltar"/></a>
        </fieldset>          
    </form>
    </div>
</body>
</html>