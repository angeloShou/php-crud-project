<?php
include_once '../../models/db.php';
include_once '../../views/LayoutPadrao.php';
$id = 0;

if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (!empty($_POST)) {
    // keep track post values
    $id = $_POST['id'];

    // Delete Data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM turma  WHERE id_turma = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Database::disconnect();
    header("Location: crudProfessor.php");
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
        <div class="container">
            <div class="row">
                <div class="row">
                    <h3>Deseja Deletar a Turma?</h3>
                </div>
                <form method="POST" action="deleteTurma.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <p class="bg-danger" style="padding: 10px;">Você deseja deletar o registro?</p>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a class="btn btn btn-default" href="crudTurma.php">Não</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->
    </body>
      <?php LayoutPadrao::Rodape();?>
</html>