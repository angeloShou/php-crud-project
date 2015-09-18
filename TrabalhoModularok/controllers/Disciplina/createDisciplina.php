<?php
include '../../views/LayoutPadrao.php';
if (!empty($_POST)) {

    // validation errors
    $nome_disciplinaError = null;


    // post values

    $nome_disciplina = $_POST['nome_disciplina'];

    echo $nome_disciplina;
    // validate input
    $valid = true;
    if (empty($nome_disciplina)) {
        $nome_disciplinaError = 'Falta digitar o Nome da Disciplina!';
        $valid = false;
    }



    // insert data
    if ($valid) {
        include_once '../../models/db.php';
        $PDO = Database::connect();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO disciplina (nome_disciplina) values(:pnome_disciplina)";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array(
            ':pnome_disciplina' => $nome_disciplina));
        $PDO = null;
        header("Location: confirmaDisciplina.php");
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
        LayoutPadrao::menuDrop();
        ?>

        <div class="container">

            <div class="span10 offset1">
                <div class="row">
                    <h3>Cadastro de Professores</h3>
                </div>

                <form class="form-horizontal" action="createDisciplina.php" method="post">

                    <div class="control-group <?php echo!empty($nome_professorError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputnome_disciplina">Nome</label>
                        <div class="controls">
                            <input style="height:30px" type="text"  required="required" name="nome_disciplina" placeholder="Nome da disciplina" id="inputnome_disciplina" value="<?php echo!empty($nome_disciplina) ? $nome_disciplina : ''; ?>" >
                            <?php if (!empty($nome_disciplinaError)): ?>
                                <span class="help-inline"> <?php echo $nome_disciplinaError; ?> </span>
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
<?php LayoutPadrao::Rodape(); ?>
</html>