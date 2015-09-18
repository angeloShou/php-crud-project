<?php
include_once '../ClassesDeBusca/TExpressoes.class.php'; 
include_once '../ClassesDeBusca/TFiltro.class.php'; 
include_once '../ClassesDeBusca/TCriterio.class.php'; 
include_once '../../views/LayoutPadrao.php';
include_once '../../models/db.php';
$buscar='';
if ( !empty($_POST)) {
$nome_turma=null;
$nome_professor=null;
$horas_turma=null;
$id_disciplina=null;

$nome_turma=$_POST['nome_turma'];
$nome_professor=$_POST['nome_professor'];
$horas_turma=$_POST['horas'];
$id_disciplina=$_POST['id_disciplina'];



$busca=new TCriterio();

if(!empty($nome_turma)){$busca->add(new TFiltro('nome_turma','LIKE',"%$nome_turma%"),TExpressoes::AND_PERERATOR);
$buscar=' WHERE '.$busca->dump();
}
if(!empty($id_disciplina)){$busca->add(new TFiltro('id_disciplina','=',(int)$id_disciplina),TExpressoes::AND_PERERATOR);
$buscar=' WHERE '.$busca->dump();
}
if(!empty($nome_professor)){$busca->add(new TFiltro('nome_professor','LIKE',"%$nome_professor%"),TExpressoes::AND_PERERATOR);
$buscar=' WHERE '.$busca->dump();
}
if(!empty($horas_turma)){$busca->add(new TFiltro('horas','=',(int)$horas_turma),TExpressoes::AND_PERERATOR);
$buscar=' WHERE '.$busca->dump();
}
}

$query='SELECT  nome_professor, nome_disciplina, nome_turma, horas
FROM turma 
INNER JOIN professor on professor.id_professor = turma.id_professor 
INNER JOIN disciplina on disciplina.id_disciplina = turma.id_disciplina
        ';

$desc = array('NOME DA TURMA','NOME DO PROFESSOR','NOME Da DISCIPLINA ','QUANT. HORS');
//$desc define,'' a descrição de titolo para a formação da grade ( tabela)
//echo $buscar;

$db1='nome_turma';
$db2='nome_professor';
$db3='nome_disciplina';
$db4='horas';
$db5=0;
$nome='nome';
$texto='texto';
$titulo='turma';//// recebe o nome da tabela no banco de dados
$titulo1='professor';
$titulo2='horas';
//nome do aluno 
$dados[$titulo][$nome]='nome_turma';
$dados[$titulo][$texto]='Nome da Turma';  

$dados[$titulo1][$nome]='nome_professor';
$dados[$titulo1][$texto]='Nome do Professor'; 

$dados[$titulo2][$nome]='horas';
$dados[$titulo2][$texto]='Horas';
 
$link='consultarTurma.php';

 
////// para buscar por idade
$modo=1;
//$link='consultarAluno.php';
$tabela='disciplina';//'disciplina';   // nome da tabela para exibir na lista do componente select
$id ='id_disciplina'; //  'id_disciplina' ;   // id da tabela para exibir no campo select
$campo ='nome_disciplina'; //  'nome_disciplina';    // noome do campo a ser listado no componente selec  
LayoutPadrao::TopoPagina();
LayoutPadrao::menuDrop();


LayoutPadrao::MenuBusca($modo,$dados,$titulo,$titulo1,$titulo2,$nome,$texto,$link,$tabela,$id,$campo);

LayoutPadrao::GeraGradeConsulta($db1,$db2,$db3,$db4,$db5,$buscar,$desc,$query);
LayoutPadrao::Rodape();

?>