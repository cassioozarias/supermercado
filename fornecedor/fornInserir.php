<?php
include '../menuPrincipal.php';
include '../conexao.php';
if ($_SESSION['permitido'] != 1){
    header("Location: ../index.php");
}

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];


if ($nome && $cpf) {

    try {
        $stmt = $conn->prepare('INSERT INTO fornecedor(nome,cpf)VALUES(:nome, :cpf)');
        $stmt->execute(array(
            ':nome'   => $nome,
            ':cpf'    => $cpf,
        ));
        header("Location: fornDados.php");
    } catch (Exception $e) {
        echo 'Error:' . $e->getMessage();
    }
}
$consulta = $conn->prepare("SELECT * FROM fornecedor order by nome = '$nomeOrde' desc;");
$consulta->execute();
?>
<div class="col-md-6">
    <form class="form-horizontal" role="form" method="POST" name="frmcadastro">
        <fieldset>
            <legend>Dados do Fornecedor</legend>
            <div class="alert-info">
                    <div class="form-group">
                        <label for="inputnome1" class="col-sm-2 control-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="col-lg-10" id="inputNome2"  placeholder="Digite o nome do fornecedor" required>
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label for="inputcpf2" class="col-sm-2 control-label">CPF:</label>
                        <div class="col-sm-10">
                            <input type="text" name="cpf" class="col-lg-10" id="inputCPF2" placeholder="Digite o CPF" required>
                        </div>
                    </div>
                </div>
            
                <input type="submit" class="btn btn-info" name="password" value="enviar" />
                <a href="fornDados.php"><input type="submit" class="btn btn-info" name="password" value="voltar"/></a>
        </fieldset>          
    </form>
    </div>
</body>
</html>