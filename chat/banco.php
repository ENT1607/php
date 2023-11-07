<?php 
    $nomeServidor = "sql212.infinityfree.com"; //localhost
    $username = "if0_35249759"; //root
    $senha ="XCFmeJ0ZRB9";
    $nomeBanco = "if0_35249759_rede_banco";

    $conexao = new mysqli($nomeServidor, $username, $senha, $nomeBanco);

    if($conexao -> connect_error){
        die("Conexão com o banco de dados falhou!". $conexao -> connect_error);
    }

?>