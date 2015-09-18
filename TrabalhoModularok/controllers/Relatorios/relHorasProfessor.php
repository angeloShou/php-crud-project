<?php
include_once '../../views/LayoutPadrao.php';
include_once '../../models/db.php';
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
                <center><h1>Quantidade de Horas de Cada Professor:</h1></center>

                <form action="relAlunosDisciplina.php" method="post">
                    <a href=""></a>

                    <form class="form-inline" role="form">
                        <div class="form-inline">

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
                        </div>	
                    </form><h4><p><blockquote><?php
                            echo '<table><tr><td>Professores (a) :</td><td>---------------------------</td><td>Horas</td> </tr> ';
                            $pdo = Database::connect();
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            foreach ($pdo->query(" SELECT SUM(turma.horas) AS Horas_aula,professor.nome_professor
                          FROM turma,professor
			  WHERE turma.id_professor = professor.id_professor
			  GROUP BY professor.nome_professor") as $row) {
                                echo "<tr> <td>$row[nome_professor]<td> --------------------------- <td></td>";
                                echo"<td>$row[Horas_aula] Horas / Aula</td> </tr>";
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