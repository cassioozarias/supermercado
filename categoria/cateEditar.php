<?php
include '../menuPrincipal.php';
include '../conexao.php';
if ($_SESSION['permitido'] != 1){
    header("Location: ../index.php");
}

$id = $_GET['id'];
$nome = $_POST['nome'];

if ($nome) {
 try {
        $stmt = $conn->prepare('UPDATE categorias SET nome = :nome WHERE id = :id');
        $stmt->execute(array(
            ':id'     => $id,
            ':nome'   => $nome,
        ));
        header("Location: cateDados.php");
    } catch (Exception $e) {
        echo 'Error:' . $e->getMessage();
    }
}
$consulta = $conn->prepare("SELECT * FROM categoria order by nome = '$nomeOrde' desc;");
$consulta->execute();
?>
        <div class="col-md-6">
            <form class="form-horizontal" role="form" method="POST" name="frmcadastro">
                <fieldset>
                    <legend>Dados de Categoria</legend>
                    <div class="alert-info">                            
                        <div class="form-group">
                            <label for="inputnome1" class="col-sm-2 control-label">Nome:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="col-lg-10" id="inputnome1"  placeholder="Digite o nome da categoria" required value="<?php echo $_GET['nome']; ?>">
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