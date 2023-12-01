<?php 
    include '../conexao.php';

    //recebendo dados do formulário
    $descricao = $_REQUEST['descricao'];
    $obs = $_REQUEST['obs'];

    //Código SQL de inserção no banco de dados
    $sql = "INSERT INTO funcao (descricao, obs)
    VALUES ('$descricao', '$obs')";

    //Executa código SQL ou mostra erro se dar errado
    $resultado = mysqli_query($conexao, $sql) or die("Erro ao Inserir");

    header('Location:../funcao.php');

?>