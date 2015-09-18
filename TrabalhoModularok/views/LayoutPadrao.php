<?php

/**
 * Description of LayoutPadrao
 *
 * @author SSSoluções
 */
class LayoutPadrao {

    public static function menuDrop() {
        echo '
            <link rel="stylesheet" href="../../layout/bootstrap/bootstrap.min.css">
                <link rel="stylesheet" href="../../layout/bootstrap/bootstrap-theme.min.css">
                <script src="../../layout/bootstrap/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../../layout/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../layout/bootstrap/dist/css/bootstrap-theme.min.css">
         <script src="../../layout/bootstrap/js/jquery.min.js"></script>
        <script src="../../layout/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../../layout/bootstrap/dist/js/bootstrap.js"></script>
        <script src="../../layout/bootstrap/js/dropdown.js"></script>
    
    <div class="navbar navbar-inverse" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  
                </button>
                <a class="navbar-brand" href="#">MENU</a>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="dropdown" data-toggle="dropdown">
                <ul class="nav navbar-nav">
              
    <form>
    <li class="nav navbar-nav">
        <!--Default buttons with dropdown menu-->
        <div class="btn-group">
           <a href="../../index.php" class="btn btn-default">Home</a>
        </div>
   </li>  
   <li class="nav navbar-nav">
        <!--Primary buttons with dropdown menu-->
   
    </form>
                 </div><!-- /.navbar-collapse -->
        </div>
    </div>
</div>

';
    }

    public static function TopoPagina() {
        echo '<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <link   href="../../layout/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../layout/js/bootstrap.min.js"></script>
</head>
 
<body>  '
        . '	<!-- begin CSS -->
    <link rel="stylesheet" href="../../includes/StyleS.css" type="text/css" media="screen"> 
    <link href="../../includes/css/style.css" type="text/css" rel="stylesheet">
	<link href="../../includes/newcss.css" type="text/css" rel="stylesheet">
	<!-- end CSS -->
	
	<!-- begin JS -->
	<script src="../js/jquery-1.7.1.min.js" type="text/javascript"></script> 
	<script src="js/modernizr-2.0.6.min.js" type="text/javascript"></script> 
	<!-- end JS -->
        </head>'
        ;
    }

    public static function MenuPrincipal() {
        echo '    
            
    <link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="../../includes/newcss.css" type="text/css" rel="stylesheet">
	<!-- end CSS -->
	
	<!-- begin JS -->
	<script src="../../includes/js/jquery-1.7.1.min.js" type="text/javascript"></script> 
	<script src="../../includes/js/modernizr-2.0.6.min.js" type="text/javascript"></script> 
        
    <link rel="stylesheet" href="../../includes/StyleS.css" type="text/css" media="screen">    
    <div id="container" style="width: 650px; margin: 40px auto 0;">

	<!-- begin navigation -->
	<nav id="navigation">
		<ul>
			<li><a href="../../views/index.php">Home</a></li>
			<li><a href="../../controllers/CreateAluno.php">Cadastrar aluno</a></li>
                        <li><a href="../../views/CreateCurso.php">Cadastrar Curso</a></li>
			<li><a href="../../views/consultar.php">Consulta</a></li>
			<li><a href="../../views/crud.php">Manutenção</a></li>
		</ul>
	</nav>
	<!-- end navigation -->
	
</div>';
    }

    public static function Rodape() {
        echo ' <style>  footer {
    position: fixed;
    height: 25px;
    bottom: 0;
    width: 100%;
    align: center;
}
</style>
 
        <footer class="navbar-inverse">
        
   <p class="text-info" >Angelo Freitas Copyright ©  2014</p>
 
	 </footer>
        
';
    }

    public static function GeraGrade($consulta, $desc, $db1, $db2, $db3, $db4, $db5, $db6, $link1, $link2, $link3) {


        echo ' 
               <meta charset="utf-8">
               <link   href="../../layout/css/bootstrap.min.css" rel="stylesheet">
                <script src="../../layout/js/bootstrap.min.js"></script>
               
               <div class="container">
            
               
            <div class="row">
                 

               <table  class="table table-striped table-bordered" lang="pt">
                  <thead>
                    <tr>';
        foreach ($desc as $nome) {
            echo'<th>' . $nome . '</th>';
        }
        echo ' 
             <th>AÇÕES</th></tr>
                  </thead>
                  <tbody>';
        include_once '../../models/db.php';
        $pdo = Database::connect();
        $sql = $consulta;
        // $sql = 'SELECT * FROM aluno INNER JOIN curso on aluno.ID_CURSO = curso.ID_CURSO';
        $pdo->exec("SET CHARACTER SET utf8");
        foreach ($pdo->query($sql) as $row) {
            echo '<tr>';
            if (!empty($db1)) {
                echo '<td>' . $row[$db1] . '</td>';
            }
            if (!empty($db2)) {
                echo '<td>' . $row[$db2] . '</td>';
            }
            if (!empty($db3)) {
                echo '<td>' . $row[$db3] . '</td>';
            }
            if (!empty($db4)) {
                echo '<td>' . $row[$db4] . '</td>';
            }
            if (!empty($db5)) {
                echo '<td>' . $row[$db5] . '</td>';
            }
            echo '<td width=250>';
            echo '<a class="btn btn-xs btn-primary" href="' . $link1 . '?id=' . $row[$db6] . '">Consulta</a>';
            echo ' ';
            echo '<a class="btn btn-xs btn-success" href="' . $link2 . '?id=' . $row[$db5] . '">Alterar</a>';
            echo ' ';
            echo '<a class="btn btn-xs btn-danger" href="' . $link3 . '?id=' . $row[$db5] . '">Deletar</a>';
            echo '</td>';
//                           
            echo '</tr>';
        }
        Database::disconnect();
        echo ' </tbody>
            </table>
            </div>
            </div> ';
    }

    public static function GeraGradeConsulta($db1, $db2, $db3, $db4, $db5, $consulta, $desc, $query) {
        
        echo' 
            <meta charset="utf-8">
               <div class="container">
            
               
            <div class="row">
                 

               <table  class="table table-striped table-bordered">
                  <thead>
                    <tr>';
        foreach ($desc as $nome) {
            echo'<th>' . $nome . '</th>';
        }
        echo '      
                    </tr>
                  </thead>
                  <tbody>';
        include_once '../../models/db.php';
        $pdo = Database::connect();
        $sql = $query;
        $sql = $sql . $consulta;
        if(isset($_POST['cbksql']))  {echo $sql;}
                                        
                                    
        $pdo->exec("SET CHARACTER SET utf8");
        foreach ($pdo->query($sql) as $row) {
            if (!empty($db1)) {
                echo '<td>' . $row[$db1] . '</td>';
            }
            if (!empty($db2)) {
                echo '<td>' . $row[$db2] . '</td>';
            }
            if (!empty($db3)) {
                echo '<td>' . $row[$db3] . '</td>';
            }
            if (!empty($db4)) {
                echo '<td>' . $row[$db4] . '</td>';
            }
            if (!empty($db5)) {
                echo '<td>' . $row[$db5] . '</td>';
            }
//                           
            echo '</tr>';
        }
        Database::disconnect();
        echo ' </tbody>
            </table>
            </div>
            </div> ';
    }

    public static function MenuBusca($modo, $dados, $titulo, $titulo1, $titulo2, $nome, $texto, $link, $tabela, $id, $campo) {

        echo '
                <link rel="stylesheet" href="../layout/bootstrap/bootstrap.min.css">
                <link rel="stylesheet" href="../layout/bootstrap/bootstrap-theme.min.css">
                <script src="../layout/bootstrap/bootstrap.min.js"></script>
                <div class="navbar navbar-inverse" role="navigation">
					<div class="navbar-header">
				        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar">a</span>
                                        <span class="icon-bar">a</span><span class="icon-bar">a</span><span class="icon-bar">a</span>
				         </button>
				        <a class="navbar-brand" rel="home">Buscar Por:</a>
                                         </div>
                                        <form class="navbar-form" action="' . $link . '" method="post">';

        if (!empty($dados[$titulo][$nome])) {
            echo '<input type="text"   class="navbar-form" style="height:33px" name="' . $dados[$titulo][$nome] . '" placeholder="' . $dados[$titulo][$texto] . '" value="">';
        }
        if (!empty($dados[$titulo1][$nome])) {
            echo ' <input type="text"   class="navbar-form" style="height:33px" name="' . $dados[$titulo1][$nome] . '" placeholder="' . $dados[$titulo1][$texto] . '"value="">';
        }
        if (!empty($dados[$titulo2][$nome])) {
            echo '  <input type="number" class="navbar-form" style="height:33px" name="' . $dados[$titulo2][$nome] . '" min="14" placeholder="' . $dados[$titulo2][$texto] . '" value="" >';
        }

        if (!empty($tabela)) {
            echo LayoutPadrao::ListaCursoss($modo,1, $tabela, $id, $campo);
        }
        //   if (!empty($tabela1)){ echo LayoutPadrao::ListaCursoss($modo,$tabela,$id,$campo);}
        //   if (!empty($tabela2)){ echo LayoutPadrao::ListaCursoss($modo,$tabela,$id,$campo);}
        //  if (!empty($tabela3)){ echo LayoutPadrao::ListaCursoss($modo,$tabela,$id,$campo);}
        echo '   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>';
                                         echo '<input type = "checkbox" name = "cbksql" value = "valor"><label class="sr-only"><a class=" btn navbar-brand" rel="home">Exibir SQL</a> </span> ';
                                
                               echo'         </form>	
                                                                    
						                </div>
				        		   </div>
                                                       ';
    }

    public static function Validar() {

        if (!empty($_POST)) {
            // validation errors
            $nome_alunoError = null;
            $periodo_alunoError = null;
            $idade_alunoError = null;
            $id_cursoError = null;

            // post values
            $nome_aluno = $_POST['nome_aluno'];
            $periodo_aluno = $_POST['periodo_aluno'];
            $idade_aluno = $_POST['idade_aluno'];
            $id_curso = $_POST['id_curso'];

            // validate input
            $valid = true;
            if (empty($nome_aluno)) {
                $nome_alunoError = 'Falta digitar o Nome do Aluno!';
                $valid = false;
            }

            if (empty($periodo_aluno)) {
                $periodo_alunoError = 'Falta digitar o Periodo do Aluno!';
                $valid = false;
            }

            if (empty($idade_aluno)) {
                $idade_alunoError = 'Falta selecionar a Idade do Aluno!';
                $valid = false;
            }

            if (empty($id_curso)) {
                $id_cursoError = 'Falta selecionar o Curso do Aluno!';
                $valid = false;
            }
        }
    }

    public static function ListaCursoss($modo,$data, $tabela, $id, $campo) {
        //$modo -> define o modo de operação
        //$tabela define nome da tabela no banco de dados
        //$id define o id da tabela
        //$campo define o campo a ser listado
        include_once '../../models/db.php';
        $pdo = Database::connect();
        $sql = "SELECT * FROM $tabela ";
        $pdo->exec("SET CHARACTER SET utf8");
        echo '<select id="inputid_curso" name="'.$id.'" >';
        if ((!empty($data))and ( $modo <> 1)and ( $modo <> 0)) {
            echo '<option  value="' . $data[$id] . '">' . $data[$campo] . '</option>';
        }//para update trazendo o curso atual
        if ($modo == 0) {
            echo '<option  value="' . !empty($id) ? $id : '' . '">' . $campo . '</option>';
        }// para cadastro verificando se o campo esta vazio
        if ($modo == 1) {
            echo '<option   value=""></option>';
        }//para usar em busca permitindo o que nao selecione nehuma opção
        foreach ($pdo->query($sql) as $row) {

            echo '<option  value="' . $row[$id] . '">' . $row[$campo] . '</option>';
        }
        Database::disconnect();

        echo'</select>';
    }

}
