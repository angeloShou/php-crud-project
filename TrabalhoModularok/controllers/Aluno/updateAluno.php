<?php
include '../../views/LayoutPadrao.php';

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
if (!empty($_POST['id'])) {
    // keep track post values
    $id = $_POST['id'];
}
if (!empty($_POST)) {

    // validation errors
    $nome_alunoError = null;
   

    // post values
    $id = $_REQUEST['gud_id'];
    $nome_aluno = $_POST['nome_aluno'];
   

    // validate input
    $valid = true;
    if (empty($nome_aluno)) {
        $nome_alunoError = 'Falta digitar o Nome do Aluno!';
        $valid = false;
    }


    // inserirt dados
    if ($valid) {
        include '../../models/db.php';
        //defino os parâmetros de conexão com o banco de dados
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //preparo minha query
        $stmt = $pdo->prepare('UPDATE aluno SET nome_aluno = :pnome_aluno WHERE id_matricula = :pid');
        //executo o comando da query passando como parâmetro minhas variáveis
        $stmt->execute(array(
            ':pid' => $id,
            ':pnome_aluno' => $nome_aluno
          
        ));
        header("Location: confirmaAluno.php ");
    }
} else {
    include_once  '../../models/db.php';
    $PDO = Database::connect();
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $PDO->exec("set names utf8");
    $sql = "SELECT * FROM aluno WHERE id_matricula =$id";
    $stmt = $PDO->prepare($sql);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $PDO = null;
    if (empty($data)) {
        header("Location: crudAluno.php ");
    }
    $nome_aluno = $data['nome_aluno'];
  
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <link   href="../../layout/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../layout/js/bootstrap.min.js"></script>
    </head>

    <body>
<?php LayoutPadrao::TopoPagina();
LayoutPadrao::menuDrop(); ?>
        <div class="container">

            <div class="span10 offset1">
                <div class="row">
                    <h3>Alterar dados do Aluno</h3>
                </div>

                <form class="form-horizontal" action="updateAluno.php" method="post">
                    <input type="hidden" name='gud_id' value="<?php echo $id; ?>" />
                    <div class="control-group <?php echo!empty($nome_alunoError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputnome_aluno" value="<?php echo!empty($nome_alunoError) ? 'has-error' : ''; ?>">Nome</label>
                        <div class="controls">
                            <input style="height:30px" type="text"  required="required" name="nome_aluno" placeholder="Nome do aluno" id="inputnome_aluno" value="<?php echo!empty($nome_aluno) ? $nome_aluno : ''; ?>" >
                                <?php if (!empty($nome_alunoError)): ?>
                                <span class="help-inline"> <?php echo $nome_alunoError; ?> </span>
                            <?php endif; ?>
                        </div>
                    </div>
                             <div class="form-actions">
                        <button type="submit" class="btn btn-success action">Salvar</button>
                        <a class="btn btn-default" href="crudAluno.php">Voltar</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->
    </body>
      <?php LayoutPadrao::Rodape();?>
</html>
