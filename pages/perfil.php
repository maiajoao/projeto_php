<?php
include('lib/conexao.php');
include('lib/protect.php');
protect(0);

$id = $_SESSION['usuario'];
$sql_query = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id'");
$usuario = $sql_query->fetch_assoc(); 

$nome = $usuario['nome'];

$email = $usuario['email'];

$old_data_cadastro = $usuario['data_cadastro'];
$data_timestamp = strtotime($old_data_cadastro);
$data_cadastro = date('d/m/Y');

if($usuario['admin']) {
    $cargo = 'Admin';
} else {
    $cargo = 'Usuário';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    
</body>
</html>