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
    $nome_professorError = null;
   

    // post values
    $id = $_REQUEST['gud_id'];
    $nome_professor = $_POST['nome_professor'];
   

    // validate input
    $valid = true;
    if (empty($nome_professor)) {
        $nome_professorError = 'Falta digitar o Nome do Professor!';
        $valid = false;
    }


    // inserirt dados
    if ($valid) {
        include '../../models/db.php';
        //defino os parâmetros de conexão com o banco de dados
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //preparo minha query
        $stmt = $pdo->prepare('UPDATE professor SET nome_professor = :pnome_professor WHERE id_professor = :pid');
        //executo o comando da query passando como parâmetro minhas variáveis
        $stmt->execute(array(
            ':pid' => $id,
            ':pnome_professor' => $nome_professor
          
        ));
        header("Location: confirmaProfessor.php ");
    }
} else {
    require '../../models/db.php';
    $PDO = Database::connect();
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $PDO->exec("set names utf8");
    $sql = "SELECT * FROM professor  WHERE id_professor =$id";
    $stmt = $PDO->prepare($sql);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $PDO = null;
    if (empty($data)) {
        header("Location: crudProfessor.php ");
    }
    $nome_professor = $data['nome_professor'];
  
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
                    <h3>Alterar dados do Professor</h3>
                </div>

                <form class="form-horizontal" action="updateProfessor.php" method="post">
                    <input type="hidden" name='gud_id' value="<?php echo $id; ?>" />
                    <div class="control-group <?php echo!empty($nome_professorError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputnome_professor" value="<?php echo!empty($nome_professorError) ? 'has-error' : ''; ?>">Nome</label>
                        <div class="controls">
                            <input style="height:30px" type="text"  required="required" name="nome_professor" placeholder="Nome do professor" id="inputnome_aluno" value="<?php echo!empty($nome_professor) ? $nome_professor : ''; ?>" >
                                <?php if (!empty($nome_professorError)): ?>
                                <span class="help-inline"> <?php echo $nome_professorError; ?> </span>
                            <?php endif; ?>
                        </div>
                    </div>
                             <div class="form-actions">
                        <button type="submit" class="btn btn-success action">Salvar</button>
                        <a class="btn btn-default" href="crudProfessor.php">Voltar</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->
    </body>
      <?php LayoutPadrao::Rodape();?>
</html>
