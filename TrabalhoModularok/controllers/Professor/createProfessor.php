<?php
include '../../views/LayoutPadrao.php';
if (!empty($_POST)) {

    // validation errors
    $nome_professorError = null;
    

    // post values

    $nome_professor = $_POST['nome_professor'];
  
    echo $nome_professor;
    // validate input
    $valid = true;
    if (empty($nome_professor)) {
        $nome_professorError = 'Falta digitar o Nome do Professor!';
        $valid = false;
    }



    // insert data
    if ($valid) {
        include_once  '../../models/db.php';
        $PDO = Database::connect();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO professor (nome_professor) values(:pnome_professor)";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array(
            ':pnome_professor' => $nome_professor));
        $PDO = null;
        header("Location: confirmaProfessor.php");
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
                    <h3>Cadastro de Professores</h3>
                </div>

                <form class="form-horizontal" action="createProfessor.php" method="post">

                    <div class="control-group <?php echo!empty($nome_professorError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputnome_aluno">Nome</label>
                        <div class="controls">
                            <input style="height:30px" type="text"  required="required" name="nome_professor" placeholder="Nome do professor" id="inputnome_professor" value="<?php echo!empty($nome_professor) ? $nome_professor : ''; ?>" >
                            <?php if (!empty($nome_professorError)): ?>
                                <span class="help-inline"> <?php echo $nome_professorError; ?> </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <a class="btn btn-default" href="../../../index.php">Voltar</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->

    </body>
    <?php LayoutPadrao::Rodape();?>
</html>