<?php
include '../menuPrincipal.php';
include '../conexao.php';
$id = $_GET['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

if ($nome && $cpf) {
    pg_query("UPDATE fornecedor SET nome ='$nome', cpf = '$cpf'where id =  $id;");
    header("location: fornDados.php");
}
?>
        <div class="col-md-6">
            <form class="form-horizontal" role="form" method="POST" name="frmcadastro">
                <fieldset>
                    <legend>Dados do Fornecedor</legend>
                    <div class="alert-info">                            
                        <div class="form-group">
                            <label for="inputnome1" class="col-sm-2 control-label">Nome:</label>
                            <div class="col-sm-10">
                                <input type="text" name="nome" class="col-lg-10" id="inputnome1"  placeholder="Digite o nome do fornecedor" required value="<?php echo $_GET['nome']; ?>">
                            </div>
                        </div>                   
                        <div class="form-group">
                            <label for="inputcpf2" class="col-sm-2 control-label">CPF:</label>
                            <div class="col-sm-10">
                                <input type="text" name="cpf" class="col-lg-10" id="inputcpf2" placeholder="Digite o CPF" required value="<?php echo $_GET['cpf']; ?>">
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