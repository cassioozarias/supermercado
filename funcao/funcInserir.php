<?php
include '../menuPrincipal.php';
include '../conexao.php';
$nome = $_POST['nome'];

if ($nome) {
    pg_query("insert into funcao(nome)values('$nome')");
    header("location: funcDados.php");
}
?>
<div class="col-md-6">
    <form class="form-horizontal" role="form" method="POST" name="frmcadastro">
        <fieldset>
            <legend>Função</legend>
            <div class="alert-info">
                    <div class="form-group">
                        <label for="inputnome1" class="col-sm-2 control-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="col-lg-10" id="inputnome1"  placeholder="Digite o nome" required>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-info" name="password" value="enviar" />
                <a href="funcInserir.php"><input type="submit" class="btn btn-info" name="password" value="voltar"/></a>
        </fieldset>          
    </form>
    </div>
</body>
</html>