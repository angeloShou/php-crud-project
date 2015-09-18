<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '/views/LayoutPadrao.php';
LayoutPadrao::TopoPagina();
?>
<html>
    <head>
        <link href="includes/StyleS.css" rel="stylesheet" type="text/css"/>
        <script src="layout/bootstrap/ajax/ajax/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
        <link href="layout/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <script src="layout/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <link href="layout/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <meta charset="UTF-8"><meta name="viewport" content="width=device-width">
        <script type="text/javascript">
            $(function () {
                $(".dropdown-menu > li > a.trigger").on("click", function (e) {
                    var current = $(this).next();
                    var grandparent = $(this).parent().parent();
                    if ($(this).hasClass('left-caret') || $(this).hasClass('right-caret'))
                        $(this).toggleClass('right-caret left-caret');
                    grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
                    grandparent.find(".sub-menu:visible").not(current).hide();
                    current.toggle();
                    e.stopPropagation();
                });
                $(".dropdown-menu > li > a:not(.trigger)").on("click", function () {
                    var root = $(this).closest('.dropdown');
                    root.find('.left-caret').toggleClass('right-caret left-caret');
                    root.find('.sub-menu:visible').hide();
                });
            });
        </script>

        <title>Trabalho Modular</title>
    </head>
    <body>  <div class="panel panel-default">
            <div class="panel-heading"> 
                <p class="alert-info"><h2>Trabalho Modular</h2> </p>
                <div class="pull-right"><button class="btn">Sobre?</button>       </div>
            </div>
            <div class="panel-body">

            </div>


        </div>

        <div class="navbar navbar-inverse" role="navigation">

            <div class="btn-group">    
                <a class="navbar-brand" rel="home" href="" title="Buy Sell Rent Everyting"> Sistema Academico.</a>
            </div>                   
            <div class="btn-group">
                <button class=" btn btn-group-xs btn-info dropdown-toggle" data-toggle="dropdown">ALUNOS<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <!-- Links de menu dropdown -->
                    <li><a href="controllers/Aluno/createAluno.php">Cadastrar Aluno</a></li>
                    <li><a href="controllers/Aluno/consultarAluno.php">Procurar Alunos</a></li>
                    <li><a href="controllers/Aluno/crudAluno.php">Alterar Dados</a></li>
                    <li><a href="controllers/matricula/CreateMatricula.php">Matricular</a></li>

                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Diciplinas<span class="caret"></span></button>
                <ul class="dropdown-menu">

                    <!-- Links de menu dropdown -->
                    <li><a href="controllers/Disciplina/createDisciplina.php" class="  dropdown-toggle">Cadastrar Disciplina</a></li>
                    <li><a href="controllers/Disciplina/consultarDisciplina.php" class=" dropdown-toggle">Procurar Disciplinas</a></li>
                    <li><a href="controllers/Disciplina/crudDisciplina.php" class="  dropdown-toggle">Alterar Dados</a></li>
                    
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-group-xs btn-warning dropdown-toggle" data-toggle="dropdown">Professores<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <!-- Links de menu dropdown -->
                    <li><a href="controllers/Professor/createProfessor.php"class=" dropdown-toggle">Cadastrar Professor</a></li>
                    <li> <a href="controllers/Professor/consultarProfessor.php"class="  dropdown-toggle">Procurar Professors</a></li>
                    <li><a href="controllers/Professor/crudProfessor.php" class="  dropdown-toggle">Alterar Dados</a></li>
                    <li><a href="#" class=" dropdown-toggle">Turmas</a></li>
                   
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-group-xs btn-success dropdown-toggle" data-toggle="dropdown">Turmas<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <!-- Links de menu dropdown -->
                    <li><a href="controllers/Turma/createTurma.php"class="  dropdown-toggle">Abrir Turma</a></li>
                    <li><a href="controllers/Turma/consultarTurma.php" class=" dropdown-toggle">Buscar Turmas</a></li>
                    <li><a href="controllers/Turma/crudTurma.php" class=" dropdown-toggle">Alterar Dados</a></li>
                   
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-group-xs btn-inverse dropdown-toggle" data-toggle="dropdown">Relatorios<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <!-- Links de menu dropdown -->
                    <li><a href="controllers/Relatorios/relHorasProfessor.php"class="  dropdown-toggle">Horas por Professor</a></li>
                   
                    <li><a href="controllers/Relatorios/relAulasDisciplina.php" class="  dropdown-toggle">Aulas por Disciplina</a></li>
                    <li><a href="controllers/Relatorios/relAlunosDisciplina.php" class="  dropdown-toggle">Alunos por Disciplina</a></li>
                    
                  
                </ul>
            </div>

        </div><!-- /btn-toolbar -->
    </div>

</body> 
</html>
