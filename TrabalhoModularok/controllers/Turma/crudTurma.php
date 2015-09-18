<?php

include '../../views/LayoutPadrao.php';
LayoutPadrao::Validar();
LayoutPadrao::TopoPagina();
LayoutPadrao::menuDrop();
//$consulta = 'SELECT aluno.nome_aluno, FROM  
           //             INNER JOIN matricula on aluno.id_matricula = matricula.id_matricula
             //           INNER JOIN turma on turma.id_matricula = matricula.id_matricula 
             //           INNER JOIN disciplina on disciplina.id_turma = turma.id_turma ';
$consulta = 'SELECT * FROM turma INNER JOIN professor on professor.id_professor = turma.id_professor INNER JOIN disciplina on disciplina.id_disciplina = turma.id_disciplina ';
$desc = array('NOME DA TURMA','NOME DO PROFESSOR','DISCIPLINA','HORAS / AULA');
$tb1 = 'nome_turma';
$tb2 = 'nome_professor';
$tb3 = 'nome_disciplina';
$tb4 = 'horas';
$db6 = //'ID_ALUNO';
$T5 = FALSE;
$db5 = FALSE;
$link1 = 'readTurma.php';
$link2 = 'updateTurma.php';
$link3 = 'deleteTurma.php';
LayoutPadrao::GeraGrade($consulta, $desc, $tb1, $tb2, $tb3, $tb4, $db5, $db6, $link1, $link2, $link3);
LayoutPadrao::Rodape();
?>