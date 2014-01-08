<?php
include '../menuPrincipal.php';
include '../conexao.php';
$nome = $_POST['nome'];

if ($nome) {
 
 try {
        $stmt = $conn->prepare('INSERT INTO funcao(nome)VALUES(:nome)');
        $stmt->execute(array(
            ':nome'   => $nome,
        ));
        header("Location: funcDados.php");
    } catch (Exception $e) {
        echo 'Error:' . $e->getMessage();
    }
}
$consulta = $conn->prepare("SELECT * FROM funcao order by nome = '$funcaoOrde' desc;");
$consulta->execute();
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