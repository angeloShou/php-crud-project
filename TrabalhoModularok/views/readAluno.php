<?php
$id = null;
if (!empty($_GET['ID_ALUNO'])) {
    $id = $_GET['ID_ALUNO'];
}
if ($id == null) {
    header("Location: index.php");
} else {
    require '../models/db.php';
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM aluno INNER JOIN curso ON aluno.ID_CURSO = curso.ID_CURSO where ID_ALUNO = ?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $PDO = null;
    if (empty($data)) {
        header("Location: index.php");
    }
    $nome_aluno = $data['NOME_ALUNO'];
    $periodo_aluno = $data['PERIODO_ALUNO'];
    $idade_aluno = $data['IDADE_ALUNO'];
    $id_curso = $data['ID_CURSO'];
}
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <link   href="../layout/css/bootstrap.min.css" rel="stylesheet">
        <script src="../layout/js/bootstrap.min.js"></script>
    </head>

    <body>
<?php
include 'LayoutPadrao.php';
LayoutPadrao::MenuPrincipal();
?>
        <div class="container">
            <div class="col-sm-12">
                <div class="row">
                    <h3>Aluno</h3>
                </div>

                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label"> Name</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo $data['NOME_ALUNO']; ?></p>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Periodo</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo $data['PERIODO_ALUNO']; ?></p>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Idade</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo $data['IDADE_ALUNO']; ?></p>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Curso</label>
                    <div class="col-sm-10">
                        <p class="form-control-static"><?php echo $data['NOME_CURSO']; ?></p>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <a class="btn btn btn-default" href="index.php">Back</a>
                </div>
            </div>                
        </div>
    </body>
      <?php LayoutPadrao::Rodape();?>
</html>
