<?php

$erro = false;
if (isset($_POST['email']) || isset($_POST['senha'])) {

    include('lib/conexao.php');
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_query = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'") or die($mysqli->error);
    $usuario = $sql_query->fetch_assoc();

    if(password_verify($senha, $usuario['senha'])) {
        if(!isset($_SESSION))
            session_start();

        $_SESSION['usuario'] = $usuario['id'];
        $_SESSION['admin'] = $usuario['admin'];
        header("Location: index.php");
    } else {
        $erro = "Senha inválida";
    }

}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php if (isset($erro) && !empty($erro)) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?php 
                echo "$erro<br>";
             ?>
        </div>
    <?php
    }
    ?>
    <h3>Formulário Cadastro</h3>
    <form action="" method="post">
        <p>
            email:
            <input type="email" name="email" id="">
        </p>
        <p>
            senha:
            <input type="text" name="senha" id="">
        </p>
        <button type="submit" name="enviar" value="1">Logar</button>

    </form>
</body>

</html>

