<?php
include '../../views/LayoutPadrao.php';
if (!empty($_POST)) {

    // validation errors
    $id_turmaError = null;
    $id_disciplinaError = null;
   $id_matriculaError=null;
   
    

    // post values

    $id_turma = $_POST['id_turma'];
    $id_disciplina= $_POST['id_disciplina'];
   $id_matricula=$_POST['id_matricula'];
    
  
  
    // validate input
    $valid = true;
    if (empty($id_turma )) {
        $id_turmaError = 'Falta Selecionar a Turma';
        $valid = false;
    }
 if (empty($id_disciplina )) {
        $id_disciplinaError = 'Falta Selecionar a Disciplina!';
        $valid = false;
    }
     if (empty($id_matricula )) {
        $id_matriculaError = 'Falta Selecionar o Aluno!';
        $valid = false;
    }
 
//

    // insert data
    if ($valid) {
        include_once  '../../models/db.php';
        $PDO = Database::connect();
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO matricula( id_disciplina, id_matricula, id_turma) VALUES (:pid_disciplina,:pid_matricula,:pid_turma) ";
        $stmt = $PDO->prepare($sql);
        $stmt->execute(array(
     ':pid_disciplina'=>$id_disciplina,
     ':pid_matricula'=>$id_matricula,
     ':pid_turma'=>$id_turma   
        ));
        $PDO = null;
        header("Location: confirmaMatricula.php");
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

                <form class="form-horizontal" action="createMatricula.php" method="post">
 <div class="control-group <?php echo!empty($id_turmaError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputid_dicip">Turma</label>
                        <div class="controls">
                            <?php
                            $data = 1;
                            LayoutPadrao::ListaCursoss(0,'', 'turma', 'id_turma', 'nome_turma');
                            ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                 
                    <div class="control-group <?php echo!empty($id_disciplinaError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputid_dicip">Disciplina</label>
                        <div class="controls">
                            <?php
                            $data = 1;
                            LayoutPadrao::ListaCursoss(0,'' ,'disciplina', 'id_disciplina', 'nome_disciplina');
                            ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="control-group <?php echo!empty($id_matriculaError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputid_prof">Aluno</label>
                        <div class="controls">
                            <?php
                            $data = 1;
                            LayoutPadrao::ListaCursoss(0,'', 'aluno', 'id_matricula', 'nome_aluno');
                            ?>
                            <span class="help-block"></span>
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