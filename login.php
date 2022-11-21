<?php

$erro = false;
if (isset($_POST['email']) || isset($_POST['senha'])) {

    include('lib/conexao.php');
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_query = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'") or die($mysqli->error);

    if ($sql_query->num_rows > 0) {
        $usuario = $sql_query->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            if (!isset($_SESSION))
                session_start();

            $_SESSION['usuario'] = $usuario['id'];
            $_SESSION['admin'] = $usuario['admin'];
            header("Location: index.php");
        } else {
            $erro = "Senha inválida";
        }
    } else {
        $erro = "E-mail inválido";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/login_style.css">
    <title>Login - MangaXpress</title>
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
    <div class="form">
        <form action="" method="post">
            <h3>Formulário Login</h3>
            <div class="form-container">
                <div class="email">
                    <span>Email</span>
                    <input type="email" name="email" id="">
                </div>
                <div class="senha">
                    <span>Senha</span>
                    <input type="text" name="senha" id="">
                </div>
                <div class="submit"><button type="submit" name="enviar" value="1">Logar</button> <a href="register.php">registrar</a></div>
            </div>
        </form>
    </div>

</body>

</html>