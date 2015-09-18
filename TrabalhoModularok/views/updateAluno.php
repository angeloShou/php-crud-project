<?php
include 'LayoutPadrao.php';
require '../models/database.php';

$id = null;
if (!empty($_GET['ID_ALUNO'])) {
    $id = $_GET['ID_ALUNO'];
}
if ($id == null) {
    header("Location: ../views/index.php");
}

LayoutPadrao::Validar();

// insert data
if ($valid) {
    $PDO = Database::connect();
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Update aluno set NOME_ALUNO=?,PERIODO_ALUNO=?,IDADE_ALUNO=?,ID_CURSO=? where ID_ALUNO=?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute(array($nome_aluno, $periodo_aluno, $idade_aluno, $id_curso, $id));
    $PDO = null;
    header("Location: ../views/index.php");
} else {
    require '../models/database.php';
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM aluno where ID_ALUNO = ?";
    $stmt = $PDO->prepare($sql);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $PDO = null;
    if (empty($data)) {
        header("Location: ../views/index.php");
    }
    $nome_aluno = $data['ID_ALUNO'];
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
<?php LayoutPadrao::MenuPrincipal(); ?>
        <div class="container">

            <div class="row">
                <div class="row">
                    <h3>Alterar dados do Aluno</h3>
                </div>

                <form method="POST" action="../models/update.php?id=<?php echo $id ?>">
                    <div class="form-group <?php echo!empty($NOME_ALUNOError) ? 'has-error' : ''; ?>">
                        <label for="inputFName">First Name</label>
                        <input type="text" class="form-control" required="required" id="inputFName" value="<?php echo!empty($nome_aluno) ? $nome_aluno : ''; ?>" name="nome" placeholder="Nome">
                        <span class="help-block"><?php echo $NOME_ALUNOError; ?></span>
                    </div>
                    <div class="form-group <?php echo!empty($periodo_aluno) ? 'has-error' : ''; ?>">
                        <label for="inputLName">Periodo</label>
                        <input type="text" class="form-control" required="required" id="inputLName" value="<?php echo!empty($periodo_aluno) ? $periodo_aluno : ''; ?>" name="periodo" placeholder="Last Name">
                        <span class="help-block"><?php echo $lnameError; ?></span>
                    </div>
                    <div class="form-group <?php echo!empty($ageError) ? 'has-error' : ''; ?>">
                        <label for="inputAge">Age</label>
                        <input type="number" required="required" class="form-control" id="inputAge" value="<?php echo!empty($age) ? $age : ''; ?>" name="age" placeholder="Age">
                        <span class="help-block"><?php echo $ageError; ?></span>
                    </div>
                    <div class="form-group <?php echo!empty($genderError) ? 'has-error' : ''; ?>">
                        <label for="inputGender">Gender</label>
                        <select class="form-control" required="required" id="inputGender" name="gender" >
                            <option></option>
                            <option value="male" <?php echo $gender == 'male' ? 'selected' : ''; ?>>Male</option>
                            <option value="female" <?php echo $gender == 'female' ? 'selected' : ''; ?>>Female</option>
                        </select>
                        <span class="help-block"><?php echo $genderError; ?></span>

                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn btn-default" href="../views/index.php">Back</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->
    </body>
      <?php LayoutPadrao::Rodape();?>
</html>
