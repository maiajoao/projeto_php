<?php

if (isset($_POST['registrar'])) {
    include('lib/conexao.php');

    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $rsenha = $mysqli->real_escape_string($_POST['rsenha']);
    
    $sql_query = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email'") or die($mysqli->error);
    $qntd = $sql_query->num_rows;

    $erro = array();
    if (empty($nome))
        $erro[] = "Preencha o nome";

    if (empty($email))
        $erro[] = "Preencha o e-mail";

    if($qntd>0) {
        $erro[] = "E-mail já cadastrado";
    }

    if (empty($senha))
        $erro[] = "Preencha a senha";

    if ($rsenha != $senha)
        $erro[] = "As senhas não batem";


    if (count($erro) == 0) {
        include('lib/enviar_email.php');

        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $mysqli->query("INSERT INTO usuarios (nome, email, senha, data_cadastro, admin) VALUES(
            '$nome', 
            '$email', 
            '$senha',
            NOW(),
            0
        )");

        $html = "<h1>Cadastro realizado com sucesso!</h1><p>Obrigado $nome por se registrar no MangaXpress!</p>";
        enviar_email($email, 'Cadastro concluido!', $html);

        die("<script>location.href=\"index.php\";</script>");
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
    <img src="assets/img/backgrounds/sanji.png" height="750px">
    <div class="container">
        <div class="forms">
            <div class="form login">
                <div class="auth-content">
                    <div class="auth-title">
                        <a href="index.php"><i class="fa-solid fa-house"></i>/</a>
                        <span class="title">Registrar</span>
                    </div>
                </div>

                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" name="nome" placeholder="Coloque seu nome" required>
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Coloque seu email" required>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="senha" placeholder="Coloque sua senha" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="rsenha" placeholder="Confirme sua senha" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" name="registrar" value="Registrar agora">
                    </div>

                    <div class="login-signup">
                        <span class="text">Já tem cadastro?
                            <a href="login.php" class="text signup-text">Logar agora</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>