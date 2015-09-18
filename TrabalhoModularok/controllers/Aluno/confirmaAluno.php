<?php include_once '../../views/LayoutPadrao.php'; LayoutPadrao::TopoPagina();?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <link   href="../../layout/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../layout/js/bootstrap.min.js"></script>
    </head>
    <link href="../../layout/bootstrap/3.3.1/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

    <body>
        <div class="container">
            <div class="row">
                <div class="row">
                    <h3>Dados incluidos com Sucesso!</h3>
                </div>
                                                    
                    <div class="form-search">
                        <a class="btn btn-success" href="CreateAluno.php">Novo Cadastro</a>
                        <a class="btn btn btn-warning" href="crudAluno.php">Ver</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->
    </body>
      <?php LayoutPadrao::Rodape();?>
</html>


