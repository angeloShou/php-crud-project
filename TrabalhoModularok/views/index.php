<?php

include 'LayoutPadrao.php';
LayoutPadrao::Validar();
LayoutPadrao::TopoPagina();
LayoutPadrao::menuDrop();
echo '<div id="container" style="width: 750px; margin: 40px auto 0;">
    <div class="col-sm-25" style="background-color:lavender;">
    <h3> 
<p class="text-justify">Temática “Linguagem WEB para acesso a banco de dados”
</h3><blockquote>
<p class="text-info">
Considere as tabelas a seguir, em um banco de dados de nome BANCO_TESTE:<br>
CURSO(id_curso, nome_curso);<br>
ALUNO (id_aluno, nome_aluno, periodo_aluno, idade_aluno, id_curso);<br>
sendo que o campo “id_curso” na tabela ALUNO é chave-estrangeira referente ao campo chaveprimária “id_curso” na tabela CURSO.
</p><br>
<p>Sabendo que a sigla CRUD (Create, Read, Update, Delete) significa as opções disponíveis em qualquer tipo de cadastro 
existente, ou seja, as funcionalidades de inserção de dados (Create), realização de pesquisas/consultas com filtros (Read),
atualização/modificação dos dados (Update) e deleção/exclusão dos dados (Delete), então construa um CRUD para cada uma dessas tabelas,
levando em consideração:</p><br>

<p >1. a tela de pesquisa/consulta de curso deverá ter a opção de filtragem por nome do curso; 
</p><br>
<p >2.a tela de pesquisa/consulta de aluno deverá ter as opções de filtragem por nome do aluno, período, idade e curso.
Sendo que poderá ser informado somente uma dessas opções ou combinações delas (até mesmo todas) ao mesmo tempo;</p> <br>
<p >3.a tela de pesquisa/consulta de aluno deverá ter as opções de curso carregadas dinamicamente em uma tag/elemento HTML “select”;</p><br>
<p >4. a tela de inserção de aluno, deverá carregar as opções de cursos disponíveis em uma tag/elemento HTML “select”, a partir do qual o usuário poderá selecionar o curso do aluno; 
</p><br>
<p >
5. a tela de alteração de aluno, deverá ter a mesma funcionalidade da tela de inserção para carregar as opções de cursos disponíveis. No entanto, o curso atual do aluno já deverá aparecer selecionado;
</p><BR>
<p>6. nas duas telas de exclusão (curso e aluno), deverá ser exibida uma mensagem de confirmação para o usuário antes de ser feita a exclusão do registro;
</p><br>
<p>7. a tela de pesquisa/consulta de curso, além de mostrar os dados do aluno, mostra o nome do curso ao qual ele está vinculado. Deverá ser feita uma função para buscar e mostrar o nome do curso. 
Essa função poderá ser utilizada nas telas de inserção e alteração dos dados do aluno;
</p><br>
<p>8. deverá ser feita validação que garanta o preenchimento de todos os dados nas telas de inserção e alteração tanto para o CRUD de curso quanto para o CRUD de aluno;
</p>
<p>9. nas telas de inserção e alteração de aluno, caso o usuário digite dados para algum campo mas não digite para outro (a validação será feita!) então os dados informados pelo usuário não deverão ser perdidos,
ou seja, ele não deverá digitar novamente os dados que já foram informados.</p><br>
<p class="text-info">
Todas as funcionalidades necessárias ao desenvolvimento do trabalho podem ser encontradas nos exemplos 
ou exercícios desenvolvidos durante as aulas, que estão disponíveis no SIGA. Qualquer dúvida deve ser 
enviada para o e-mail carlosladeira@gmail.com O prazo para a entrega do trabalho é o dia 23/10/2014,
até antes do início da aula, ou seja, até às 19 horas. Para facilitar a avaliação, os nomes utilizados
para o banco de dados, tabelas e campos deverão ser exatamente iguais aos descritos nesta proposta de trabalho.
Um modelo do trabalho que será desenvolvido pode ser visto em:
</p>
http://professorcarlos.webcindario.com/php/trabalho/consulta_mysqli.php</blockquote> </p>
</div>
</div>';
LayoutPadrao::Rodape();
?>