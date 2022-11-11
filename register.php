<?php

if (isset($_POST['enviar'])) {
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
    <title>Document</title>
</head>

<body>
    <?php if (isset($erro) && count($erro) > 0) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($erro as $e) {
                echo "$e<br>";
            } ?>
        </div>
    <?php
    }
    ?>
    <h3>Formulário Cadastro</h3>
    <form action="" method="post">
        <p>
            Nome:
            <input type="text" name="nome" id="">
        </p>
        <p>
            email:
            <input type="email" name="email" id="">
        </p>
        <p>
            senha:
            <input type="text" name="senha" id="">
        </p>
        <p>
            repitir senha:
            <input type="text" name="rsenha" id="">
        </p>
        <button type="submit" name="enviar" value="1">Cadastrar</button>

    </form>
</body>

</html>
