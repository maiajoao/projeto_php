<?php
include("lib/conexao.php");
include("lib/enviar_arquivo.php");
include('lib/protect.php');
protect(1);

if(isset($_POST['registrar'])) {

    $nome = $mysqli->real_escape_string($_POST['nome']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);
    $rsenha = $mysqli->real_escape_string($_POST['rsenha']);
    $admin = $mysqli->real_escape_string($_POST['admin']);

    $erro = array();
    if(empty($nome))
        $erro[] = "Preencha o nome";

    if(empty($email))
        $erro[] = "Preencha o e-mail";

    if(empty($senha))
        $erro[] = "Preencha a senha";

    if($rsenha != $senha)
        $erro[3] = "As senhas não batem";

    if(count($erro) == 0) {

        $senha = password_hash($senha, PASSWORD_DEFAULT);
        $mysqli->query("INSERT INTO usuarios (nome, email, senha, data_cadastro, admin) VALUES(
            '$nome', 
            '$email', 
            '$senha',
            NOW(),
            '$admin'
        )");
        die("<script>location.href=\"index.php?p=gerenciar_usuarios\";</script>");

    }
}
?>

<link rel="stylesheet" href="assets/css/admin_cadastro.css">

<div class="container">
        <div class="forms">
            <div class="form login">
                <div class="auth-content">
                    <div class="auth-title">
                        <a href="?p=gerenciar_usuarios"><i class="fa-solid fa-screwdriver-wrench"></i>/</a>
                        <span class="title">Cadastrar Usuário</span>
                    </div>
                </div>

                <form action="" method="POST">
                    <div class="input-field">
                        <input type="text" name="nome" placeholder="Nome" required>
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Email" required>
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="senha" placeholder="Senha" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="rsenha" placeholder="Confirmar senha" required>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="input-field">
                        <select name="admin" class="custom-select">
                            <option value="0">Usuário</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>

                    <?php if(isset($erro[3])) { ?>
                        <span class="error"><?php echo $erro[3]; ?></span>
                    <?php } ?>

                    <div class="input-field button">
                        <input type="submit" name="registrar" value="Cadastrar">
                    </div>
                </form>
            </div>
        </div>
    </div>