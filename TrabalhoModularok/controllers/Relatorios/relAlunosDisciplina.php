<?php
include_once '../../views/LayoutPadrao.php';
include_once '../../models/db.php';

if(empty($_POST)){
$and =  'AND 1=1';

}
if(!empty($_POST)){
$id_disciplina=$_POST['id_disciplina'];

$and= 'AND disciplina.id_disciplina ='.$id_disciplina.'';

                
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
        LayoutPadrao::menuDrop();
        ?>
        <div class="container">
            <div class="col-sm-8" style="background-color:lavender;">
                <center><h1>Quantidade de Alunos de Cada Disciplina:</h1></center>

                     <form action="relAlunosDisciplina.php" method="post">
                    

                   
                        <div class="form-inline">

            <div class="control-group ">
                        <label class="control-label" for="inputid_dicip">Disciplina</label>
                        <div class="controls">
                            <?php
                           
                            LayoutPadrao::ListaCursoss(0,'', 'disciplina', 'id_disciplina', 'nome_disciplina');
                            ?>
                            <span class="help-block"></span>
                        </div>
                    </div>
                        </div>	
                         <div class="form-actions">
                        <button type="submit" class="btn btn-success">Buscar</button>
                       
                    </div>
                    </form>
                <h4><p><blockquote><?php
                  
                            echo '<table><tr><td>Disciplinas :</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Numero de alunos Matriculados</td> </tr> ';
                            $pdo = Database::connect();
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            foreach ($pdo->query(" SELECT COUNT(aluno.id_matricula)As Alunos ,disciplina.nome_disciplina
             FROM aluno,matricula,turma,disciplina
			 WHERE aluno.id_matricula = matricula.id_matricula
			 AND matricula.id_turma = turma.id_turma
			 AND matricula.id_disciplina = turma.id_disciplina
			 AND turma.id_disciplina = disciplina.id_disciplina
                         $and
                	 GROUP BY disciplina.nome_disciplina") as $row) {
                                echo "<tr> <td>$row[nome_disciplina]<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td></td>";
                                echo"<td>$row[Alunos] Alunos</td> </tr>";
                            }
                            ?>
                           </table>
                            </p></blockquote>
                        </div> 
                        </div> <!-- /container -->
                        <div class="form-actions">

                            <a class="btn btn-default" href="../../index.php">Voltar</a>
                        </div>

                        </body>
<?php LayoutPadrao::Rodape(); ?>
                        </html>