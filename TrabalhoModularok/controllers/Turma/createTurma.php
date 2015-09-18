<?php
include '../../views/LayoutPadrao.php';
if (!empty($_POST)) {

    // validation errors
    //$id_turmaError = null;
    $id_disciplinaError = null;
    $nome_turmaError = null;
    $horas_turmaError = null;
    $id_professorError = null;
    

    // post values

   // $id_turma = $_POST['id_turma'];
    $id_disciplina= $_POST['id_disciplina'];
    $nome_turma = $_POST['nome_turma'];
    $horas_turma = $_POST['horas_turma'];
    $id_professor = $_POST['id_professor'];
  
  
    // validate input
    $valid = true;
//    if (empty($id_turma )) {
//        $id_turmaError = '';
//        $valid = false;
//    }
 if (empty($id_disciplina )) {
        $id_disciplinaError = 'Falta Selecionar a Disciplina!';
        $valid = false;
    }
     if (empty($nome_turma )) {
        $nome_turmaError = 'Falta digitar o Nome da Turma!';
        $valid = false;
    }
     if (empty($horas_turma )) {
        $horas_turmaError = 'Falta digitar a Quantidade de Horas do Professor!';
        $valid = false;
    }
     if (empty($id_professor )) {
        $id_professorError = 'Falta selecionar o Nome do Professor!';
        $valid = false;
    }
//

    // insert data
    if ($valid) {
        include_once  '../../models/db.php';
        $PDO = Database::connect();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO turma( id_disciplina, nome_turma, horas, id_professor) VALUES (:pid_disciplina,:pnome_turma,:phoras_turma,:pid_professor) ";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array(
     ':pid_disciplina'=>$id_disciplina,
     ':pnome_turma'=>$nome_turma,
     ':phoras_turma'=>$horas_turma,
     ':pid_professor'=>$id_professor   
        ));
        $PDO = null;
        header("Location: confirmaTurma.php");
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

                <form class="form-horizontal" action="createTurma.php" method="post">

                    <div class="control-group <?php echo!empty($nome_turmaError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputnome_turma">Nome da Turma</label>
                        <div class="controls">
                            <input style="height:30px" type="text"  required="required" name="nome_turma" placeholder="Nome do turma" id="inputnome_turma" value="<?php echo!empty($nome_turma) ? $nome_turma : ''; ?>" >
                            <?php if (!empty($nome_professorError)): ?>
                                <span class="help-inline"> <?php echo $nome_professorError; ?> </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="control-group <?php echo!empty($id_disciplinaError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputid_dicip">Disciplina</label>
                        <div class="controls">
                            <?php
                            $data = 1;
                            LayoutPadrao::ListaCursoss(0,'', 'disciplina', 'id_disciplina', 'nome_disciplina');
                            ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="control-group <?php echo!empty($id_professorError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputid_prof">Professor</label>
                        <div class="controls">
                            <?php
                            $data = 1;
                            LayoutPadrao::ListaCursoss(0,'', 'professor', 'id_professor', 'nome_professor');
                            ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                     <div class="control-group <?php echo!empty($horas_turmaError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputidade_hora">Horas</label>
                        <div class="controls">
                            <input style="height:30px" type="number" min="1" required="required"  id="inputidade_hora" value="<?php echo!empty($horas_turma) ? $horas_turma : ''; ?>" name="horas_turma" placeholder="horas turma">
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <a class="btn btn-default" href="../../index.php">Voltar</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->

    </body>
    <?php LayoutPadrao::Rodape();?>
</html>