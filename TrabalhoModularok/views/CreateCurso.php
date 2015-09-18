<?php
include '../views/LayoutPadrao.php';
if (!empty($_POST)) {

    // validation errors

    $id_cursoError = null;

    // post values
    $id = $_POST['id'];

    $id_curso = $_POST['nome_curso'];

    // validate input
    $valid = true;


    if (empty($id_curso)) {
        $id_cursoError = 'Falta selecionar o Curso do Aluno!';
        $valid = false;
    }


    // insert data
    if ($valid) {
        require '../models/db.php';
        $PDO = Database::connect();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO curso (NOME_CURSO) values(?)";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array($id_curso));
        $PDO = null;
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <link href="../layout/newcss.css" type="text/css" rel="stylesheet">
        <link   href="../layout/css/bootstrap.min.css" rel="stylesheet">
        <link   href="../layout/css/bootstrap2.min.css" rel="stylesheet">
        <script src="../layout/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php LayoutPadrao::TopoPagina();
        LayoutPadrao::menuDrop(); ?>

        <div class="container">

            <div class="span10 offset1">
                <div class="row">
                    <h3>Cadastro de Curso</h3>
                </div>

                <form class="form-horizontal" action="CreateCurso.php" method="post">

                    <div class="control-group <?php echo!empty($nome_alunoError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputnome_curso">Nome</label>
                        <div class="controls">
                            <input style="height:30px" type="text"  required="required" name="nome_curso" placeholder="Nome do curso" id="inputnome_curso" value="<?php echo!empty($id_curso) ? $id_curso : ''; ?>" >
                            <?php if (!empty($id_cursoError)): ?>
                                <span class="help-inline"> <?php echo $id_cursoError; ?> </span>
                            <?php endif; ?>
                        </div>
                    </div>







                    <span class="help-block"></span>

            </div>
        </div>


        <div class="form-actions">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a class="btn btn-default" href="index.php">Voltar</a>
        </div>
    </form>

</div> <!-- /row -->
</div> <!-- /container -->

</body>
  <?php LayoutPadrao::Rodape();?>
</html>