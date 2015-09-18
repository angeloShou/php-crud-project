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
    $id_disciplinaError = null;
    $nome_turmaError = null;
    $horas_turmaError = null;
    $id_professorError = null;
    
   

    // post values
  echo  $id = $_POST['gud_id'];
   echo $id_disciplina= $_POST['id_disciplina'];
  echo  $nome_turma = $_POST['nome_turma'];
 echo   $horas_turma = $_POST['horas_turma'];
 echo   $id_professor = $_POST['id_professor'];
  

    // validate input
    $valid = true;
    
 if (empty($id_disciplina)) {
        $id_disciplinaError = 'Falta digitar o Nome da Disciplina!';
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

    // inserirt dados
    if ($valid) {
        include '../../models/db.php';
        //defino os parâmetros de conexão com o banco de dados
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //preparo minha query
        $stmt = $pdo->prepare('UPDATE turma SET id_professor = :pid_professor,id_disciplina = :pid_disciplina, horas = :phoras,nome_turma = :pnome_turma WHERE id_turma = :pid');
        //executo o comando da query passando como parâmetro minhas variáveis
        $stmt->execute(array(
            ':pid' => $id,
            ':pid_professor' =>$id_professor,
            ':pid_disciplina'=>$id_disciplina,
            ':phoras '=>$horas_turma,
            ':pnome_turma'=> $nome_turma  
        ));
        header("Location: confirmaTurma.php ");
    }
} else {
    require '../../models/db.php';
    $PDO = Database::connect();
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $PDO->exec("set names utf8");
    $sql = "SELECT professor.id_professor, nome_professor,disciplina.id_disciplina, nome_disciplina, nome_turma, horas
            FROM turma 
            INNER JOIN professor on professor.id_professor = turma.id_professor 
            INNER JOIN disciplina on disciplina.id_disciplina = turma.id_disciplina WHERE id_turma =$id";
    $stmt = $PDO->prepare($sql);
    $stmt->execute(array($id));
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $PDO = null;
    if (empty($data)) {
        header("Location: crudTurma.php ");
    }
    $id_professor = $data['id_professor'];
    $nome_turma=$data['nome_turma'];
    $horas_turma=$data['horas'];
    $id_disciplina=$data['id_disciplina'];


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
                    <h3>Alterar dados da Turma</h3>
                </div>

                <form class="form-horizontal" action="updateTurma.php" method="post">
                    <input type="hidden" name='gud_id' value="<?php echo $id; ?>" />
                                       
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
                            
                            LayoutPadrao::ListaCursoss(2,$data, 'disciplina', 'id_disciplina', 'nome_disciplina');
                            ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="control-group <?php echo!empty($id_professorError) ? 'has-error' : ''; ?>">
                        <label class="control-label" for="inputid_prof">Professor</label>
                        <div class="controls">
                            <?php
                           
                            LayoutPadrao::ListaCursoss(2,$data, 'professor', 'id_professor', 'nome_professor');
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
                        <button type="submit" class="btn btn-success action">Salvar</button>
                        <a class="btn btn-default" href="crudTurma.php">Voltar</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->
    </body>
      <?php LayoutPadrao::Rodape();?>
</html>
