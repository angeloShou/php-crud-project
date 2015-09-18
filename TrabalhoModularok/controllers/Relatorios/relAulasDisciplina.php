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
                <center><h1>Quantidade de AULAS de Cada Disciplina:</h1></center>

                <form action="readTurma.php" method="post">

                    <form class="form-inline" role="form">
                        <div class="form-inline">


                        </div>	
                    </form><h4><p><blockquote><?php
                            echo '<table><tr><td>Disciplina :</td><td>---------------------------</td><td>Total de Aulas</td> </tr> ';
                            $pdo = Database::connect();
                            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            foreach ($pdo->query(" SELECT nome_disciplina, disciplina.id_disciplina,SUM(turma.horas) AS Aulas
             FROM disciplina,turma
             WHERE turma.id_disciplina = disciplina.id_disciplina
             GROUP BY disciplina.id_disciplina, nome_disciplina") as $row) {
                                echo "<tr> <td>$row[nome_disciplina]<td> --------------------------- <td></td>";
                                echo"<td>$row[Aulas]  Aulas</td> </tr>";
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