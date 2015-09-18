<?php include_once '../../views/LayoutPadrao.php'; LayoutPadrao::TopoPagina();?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <link   href="../../layout/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../layout/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="row">
                    <h3>Dados incluidos com Sucesso!</h3>
                </div>
                                                    
                    <div class="form-actions">
                        <a class="btn btn-success" href="CreateTurma.php">Novo Cadastro</a>
                        <a class="btn btn btn-warning" href="crudTurma.php">Ver</a>
                    </div>
                </form>

            </div> <!-- /row -->
        </div> <!-- /container -->
    </body>
      <?php LayoutPadrao::Rodape();?>
</html>


