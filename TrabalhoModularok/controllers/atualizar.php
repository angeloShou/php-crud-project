
<?php

//pega o id que se deseja modificar
$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}
//O novo valor do campo a ser modificado
$id = $_POST['id'];
$nome_aluno = $_POST['nome_aluno'];
$periodo_aluno = $_POST['periodo_aluno'];
$idade_aluno = $_POST['idade_aluno'];
$id_curso = $_POST['id_curso'];
echo $id;
echo $nome_aluno;
echo $idade_aluno;
echo $id_curso;
echo $periodo_aluno;
// 
try {
    require '../models/db.php';
    //defino os parâmetros de conexão com o banco de dados
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //preparo minha query
    $stmt = $pdo->prepare('UPDATE aluno SET NOME_ALUNO = :pnome_aluno, PERIODO_ALUNO = :pperiodo_aluno, IDADE_ALUNO = :pidade_aluno,ID_CURSO = :pid_curso WHERE ID_ALUNO = :pid');
    //executo o comando da query passando como parâmetro minhas variáveis
    $stmt->execute(array(
        ':pnome_aluno' => $nome_aluno,
        ':pperiodo_aluno' => $periodo_aluno,
        ':pidade_aluno' => $idade_aluno,
        ':pid_curso' => $id_curso,
        ':pid' => $id
    ));

    echo $stmt->rowCount();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
