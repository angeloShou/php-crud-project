<?php

include '../../views/LayoutPadrao.php';
LayoutPadrao::Validar();
LayoutPadrao::TopoPagina();
LayoutPadrao::menuDrop();
//$consulta = 'SELECT aluno.nome_aluno, FROM  
           //             INNER JOIN matricula on aluno.id_matricula = matricula.id_matricula
             //           INNER JOIN turma on turma.id_matricula = matricula.id_matricula 
             //           INNER JOIN disciplina on disciplina.id_turma = turma.id_turma ';
$consulta = 'SELECT * FROM disciplina ';
$desc = array('NOME DA DISCIPLINA');
$tb1 = 'nome_disciplina';
$tb2 = //'matricula';
$tb3 = //'IDADE_ALUNO';
$tb4 = //'turma';
$db6 = //'ID_ALUNO';
$T5 = FALSE;
$db5 = FALSE;
$link1 = 'readDisciplina.php';
$link2 = 'updateDisciplina.php';
$link3 = 'deleteDisciplina.php';
LayoutPadrao::GeraGrade($consulta, $desc, $tb1, $tb2, $tb3, $tb4, $db5, $db6, $link1, $link2, $link3);
LayoutPadrao::Rodape();
?>