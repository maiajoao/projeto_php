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
            $_SESSION['nome_usuario'] = $usuario['nome']; 
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
    <script src="https://kit.fontawesome.com/682b28ed24.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets/css/auth_style.css">
    <title>Login - MangaXpress</title>
</head>

<body>
    <img src="assets/img/backgrounds/trafalgar-law.png" height="70%">
    <div class="container">
        <div class="forms">
            <div class="form login">
                <div class="auth-content">
                    <div class="auth-title">
                        <a href="index.php"><i class="fa-solid fa-house"></i>/</a>
                        <span class="title">Login</span>
                    </div>
                </div>

                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Escreva seu email" required>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="senha" placeholder="Escreva sua senha" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    
                    <div class="forgotpass-text">
                        <a href="" class="text">Esqueci minha senha</a>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="logar" value="Logar agora">
                    </div>

                    <div class="login-signup">
                        <span class="text">Novo por aqui?
                            <a href="register.php" class="text signup-text">Registre-se agora</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>