<?php
include_once '../../views/LayoutPadrao.php';
include_once '../../models/db.php';


$consulta = '
    SELECT nome_aluno, nome_professor, nome_disciplina, nome_turma, horas
FROM turma 
INNER JOIN professor on professor.id_professor = turma.id_professor 
INNER JOIN disciplina on disciplina.id_disciplina = turma.id_disciplina
INNER JOIN matricula on matricula.id_turma = turma.id_turma
INNER JOIN aluno on matricula.id_matricula = aluno.id_matricula
where turma.id_turma =?';


$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: ../../index.php");
} else {
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $consulta;
    $q = $pdo->prepare($sql);
    $pdo->exec("set names utf8");
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $PDO = null;
    if (empty($data)) {
        header("Location: crudTurma.php");
    }
    $nome_professor = $data['nome_professor'];
    $nome_disciplina= $data['nome_disciplina'];
    $nome_turma = $data['nome_turma'];
    $horas_turma = $data['horas'];
    $alunos_Turma = $data['nome_aluno'];
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
            <div class="col-sm-6" style="background-color:lavender;">
                <center><h1>Informações da Turma:</h1></center>

                <form action="readTurma.php" method="post">

                    <form class="form-inline" role="form">
                        <div class="form-inline">


                        </div>	
                    </form><h4><p><blockquote><?php
                    
echo '<p>Nome da Turma(a) :' . $nome_turma . '</p><br>';
echo '<p>Nome do Professor(a) :' . $nome_professor . '</p><br>';
echo '<p>Nome da Disciplina :' . $nome_disciplina . '</p><br>';
echo '<p>Quantidade de Horas / Aula: ' . $horas_turma . '</p><br>';
echo 'Alunos (a) :';
foreach ($pdo->query( " SELECT nome_aluno, nome_professor, nome_disciplina, nome_turma, horas
FROM turma 
INNER JOIN professor on professor.id_professor = turma.id_professor 
INNER JOIN disciplina on disciplina.id_disciplina = turma.id_disciplina
INNER JOIN matricula on matricula.id_turma = turma.id_turma
INNER JOIN aluno on matricula.id_matricula = aluno.id_matricula
where turma.id_turma =$id") as $row) {
 echo "<p>   $row[nome_aluno]  </p><br>";   
}

?>
                            </p></blockquote>
                        </div> 
                        </div> <!-- /container -->
                         <div class="form-actions">
                       
                             <a class="btn btn-default" href="crudTurma.php">Voltar</a>
                    </div>

   </body>
                            <?php LayoutPadrao::Rodape(); ?>
  </html>