<?php
include '../menuPrincipal.php';
include '../conexao.php';
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$funcao = $_POST['funcao'];
$funcaoOrde = $_GET['funcao'];

if ($nome && $cpf) {
 try {
        $stmt = $conn->prepare('INSERT INTO funcionario(nome,cpf,funcao)VALUES(:nome, :cpf, :funcao)');
        $stmt->execute(array(
            ':nome'   => $nome,
            ':cpf'    => $cpf,
            ':funcao' => $funcao,
        ));
        header("Location: funciDados.php");
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
            <legend>Dados do Funcionario</legend>
            <div class="alert-info">
                    <div class="form-group">
                        <label for="inputnome1" class="col-sm-2 control-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="col-lg-10" id="inputNome2"  placeholder="Digite seu nome" required>
                        </div>
                    </div>                   
                    <div class="form-group">
                        <label for="inputcpf2" class="col-sm-2 control-label">CPF:</label>
                        <div class="col-sm-10">
                            <input type="text" name="cpf" class="col-lg-10" id="inputCPF2" placeholder="Digite seu CPF" required>
                        </div>
                    </div>
                <div class="form-group">
                        <label for="inputcodigo3" class="col-sm-2 control-label">Função:</label>
                        <div class="col-sm-10">
                            <select name="funcao">
                                <?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)): ?>
                                    <option value="<?php echo $linha->id; ?>"><?php echo $linha->nome; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                </div>
            
                <input type="submit" class="btn btn-info" name="password" value="enviar" />
                <a href="funciDados.php"><input type="submit" class="btn btn-info" name="password" value="voltar"/></a>
        </fieldset>          
    </form>
    </div>
</body>
</html>