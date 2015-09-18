<?php
include_once '../../views/LayoutPadrao.php';
include_once '../../models/db.php';


$consulta = "SELECT * FROM aluno WHERE id_matricula =?";
if (isset($nome)) {
    $consulta = $consulta . " AND nome_aluno LIKE '%" . $nome . "%'";
}

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: ../../views/index.php");
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
        header("Location: ../../index.php");
    }
    $nome_aluno = $data['nome_aluno'];
   
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
            <div class="col-sm-3" style="background-color:lavender;">
                <center><h1>Informações de pesquisa:</h1></center>

                <form action="../../controllers/readAluno.php" method="post">

                    <form class="form-inline" role="form">
                        <div class="form-inline">


                        </div>	
                    </form><h4><p><blockquote><?php
echo 'Nome do Aluno(a) :' . $nome_aluno . '<br>';



?>
                            </p></blockquote>
                        </div> 
                        </div> <!-- /container -->
                         <div class="form-actions">
                       
                        <a class="btn btn-default" href="crudAluno.php">Voltar</a>
                    </div>

   </body>
                            <?php LayoutPadrao::Rodape(); ?>
  </html>