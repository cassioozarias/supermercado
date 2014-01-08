<?php
include '../menuPrincipal.php';
include '../conexao.php';
if ($_SESSION['permitido'] != 1){
    header("Location: ../index.php");
}
$id    = $_GET['id'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$loginOrde = $_GET['login'];

if ($login&& $senha ) {

    try {
        $stmt = $conn->prepare('UPDATE usuario SET login = :login, senha = :senha WHERE id = :id');
        $stmt->execute(array(
            ':id'     => $id,
            ':login'  => $login,
            ':senha'  => $senha,
        ));
        header("Location: usuaDados.php");
    } catch (Exception $e) {
        echo 'Error:' . $e->getMessage();
    }
}
$consulta = $conn->prepare("SELECT * FROM usuario order by login = '$loginOrde' desc;");
$consulta->execute();
?>
<div class="col-md-6">
    <form class="form-horizontal" role="form" method="POST" name="frmcadastro">
        <fieldset>
            <legend>Dados do Usuário</legend>
            <div class="alert-info">
                <div class="form-group">
                    <label for="inputlogin2" class="col-sm-2 control-label">Login:</label>
                    <div class="col-sm-10">
                        <input type="text" name="login" class="col-lg-10" id="inputlogin2"  placeholder="Digite seu login" required value="<?php echo $_GET['login']; ?>">
                    </div>
                </div>                   
                <div class="form-group">
                    <label for="inputsenha3" class="col-sm-2 control-label">Senha:</label>
                    <div class="col-sm-10">
                        <input type="text" name="senha" class="col-lg-10" id="inputSenha3" placeholder="Digite sua senha" required value="<?php echo $_GET['senha']; ?>">
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-info" name="password" value="enviar" />
            <a href="usuaDados.php"><input type="submit" class="btn btn-info" name="password" value="voltar"/></a>
        </fieldset>
    </form>
</div>
</body>
</html>