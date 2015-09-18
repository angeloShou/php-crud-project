<?php
include '../../views/LayoutPadrao.php';
if (!empty($_POST)) {

    // validation errors
    $nome_alunoError = null;
    

    // post values

    $nome_aluno = $_POST['nome_aluno'];
  
    echo $nome_aluno;
    // validate input
    $valid = true;
    if (empty($nome_aluno)) {
        $nome_alunoError = 'Falta digitar o Nome do Aluno!';
        $valid = false;
    }



    // insert data
    if ($valid) {
        include_once  '../../models/db.php';
        $PDO = Database::connect();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO aluno (nome_aluno) values(:pnome_aluno)";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array(
            ':pnome_aluno' => $nome_aluno));
        $PDO = null;
        header("Location: confirmaAluno.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <link href="../../layout/newcss.css" type="text/css" rel="stylesheet">
        <link   href="../../layout/css/bootstrap.min.css" rel="stylesheet">
        <link   href="../../layout/css/bootstrap2.min.css" rel="stylesheet">
        <script src="../../layout/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php LayoutPadrao::TopoPagina();
        LayoutPadrao::menuDrop(); ?>

        <div class="container">

            <div class="span10 offset1">
                <div class="row">
                    <h3>Cadastro de Aluno</h3>
                </div>

                <form class="form-horizontal" action="createAluno.php" method="post">

                    <div class="control-group <?php echo!empty($nome_alunoError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputnome_aluno">Nome</label>
                        <div class="controls">
                            <input style="height:30px" type="text"  required="required" name="nome_aluno" placeholder="Nome do aluno" id="inputnome_aluno" value="<?php echo!empty($nome_aluno) ? $nome_aluno : ''; ?>" >
                            <?php if (!empty($nome_alunoError)): ?>
                                <span class="help-inline"> <?php echo $nome_alunoError; ?> </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <a class="btn btn-default" href="../../index.php">HOME</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->

    </body>
    <?php LayoutPadrao::Rodape();?>
</html>