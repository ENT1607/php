<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Chat </title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php 
        include "banco.php";
        session_start();

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario'])){
            $_SESSION['usuario'] = $_POST['usuario'];
        }

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['mensagem'])){

            $mensagem = $_POST['mensagem'];
            //$usuario = $_SESSION['usuario'] ? $_SESSION['usuario'] : 'Anônimo';

            if(isset($_SESSION['usuario'])){

                $usuario = $_SESSION['usuario'];

            } else{
                $usuario = 'Anônimo';
            }
            $sql = "INSERT INTO tabela_mensagens(usuario, mensagem) VALUES ('$usuario','$mensagem')";

            $conexao -> query($sql);
        }

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])){
            $id = $_POST['id'];
            $sql = "DELETE FROM tabela_mensagens WHERE id= $id";
            $conexao -> query($sql);
        }
    ?>

    <div class="painel">
        <h1> Senac Connect - Chat com PHP e MYSQL </h1>

        <div class="chat">

        <?php
            
                $sql = "SELECT usuario, mensagem, id FROM  tabela_mensagens ORDER BY id DESC";

                $resultado = $conexao -> query($sql);

                if($resultado-> num_rows > 0){

                    while($linha = $resultado -> fetch_assoc()){
                          echo '<div class="mensagens">';
                          echo "<p> <b> {$linha['usuario']} </b> {$linha['mensagem']} </p>";   

                          echo '<form method="POST" action="">';
                          echo "<input type='text' name='id' value='{$linha['id']}'>";
                          echo "<button type='submit' name='excluir'> Excluir </button>";
                          echo '</form>';
                          
                          echo '</div>';
                    }

                   
                }else{
                    echo "<p> Nenhuma mensagem encontrada! </p>";
                }
            ?>

        </div>

        <form method="POST" action=""> 
            <input type="text" name="mensagem" placeholder="Digite sua mensagem!">
            <button type="submit"> Enviar Mensagem </button>
        </form>

        <form method="POST" action="">
            <input type="text" name="usuario" placeholder="Escolha um nome de usuário">
            <button type="submit"> Atualizar Nome </button>
        </form>


    </div>
</body>
</html>