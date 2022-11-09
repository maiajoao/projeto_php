<?php
// Conexão com o Banco de dados

// Protejer contra contas não logadas

// Caso não tenha iniciado uma sessão
if(!isset($_SESSION)) { 
    session_start();
}

// query_string
$pagina = 'inicial.php';
if(isset($_GET['p'])) {
    $pagina = $_GET['p'] . '.php';
}

// Coletar os dados do usuário logado

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main-body">
        <div class="page-wrapper">
            <?php include('pages/' . $pagina); ?>
        </div>
    </div>
</body>
</html>