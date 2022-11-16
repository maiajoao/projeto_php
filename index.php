<?php
// Conexão com o Banco de dados
// include('lib/conexao.php');

// Protejer contra contas não logadas

// Caso não tenha iniciado uma sessão
if (!isset($_SESSION)) {
    session_start();
}

// query_string
$pagina = 'destaque.php';
if (isset($_GET['p'])) {
    if (file_exists('pages/' . $_GET['p'] . '.php')) {
        $pagina = $_GET['p'] . '.php';
    } else {
        $pagina = 'erro.php';
    }
}

// Coletar os dados do usuário logado

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/header_style.css" />
    <script src="https://kit.fontawesome.com/682b28ed24.js" crossorigin="anonymous"></script>
    <title>Loja - MangaXpress</title>
</head>

<body>
    <header>
        <nav class="principal-nav">
            <div class="nav-container">
                <a href="" class="brand">
                    <h1>
                        <span id="brand-name1">Manga</span><span id="brand-name2">Xpress</span>
                    </h1>
                </a>
                <div class="search">
                    <input type="text" name="search-bar" id="#" class="search-bar" />
                    <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                </div>
                <div class="menu">
                    <?php if (isset($_SESSION['admin'])) {
                        if ($_SESSION['admin'] == 1) {
                            echo '<a href="#"><i class="fa-solid fa-screwdriver-wrench"></i></a>';
                        }
                    } ?>
                    <a href="<?php if (empty($_SESSION)) {
                                    echo 'login.php';
                                } else {
                                    echo '?p=perfil';
                                } ?>"><i class="fa-solid fa-user"></i></a>
                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="#"><i class="fa-solid fa-heart"></i></a>
                    <a href="#"><i class="fa-solid fa-bookmark"></i></a>
                </div>
                <button class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </nav>
        <nav class="secundary-nav">
            <div class="nav-container-secundary">
                <a href="?p=destaque">Destaques</a>
                <a href="?p=lancamento">Lançamentos</a>
                <a href="?p=pre-venda">Pré-vendas</a>
            </div>
        </nav>
    </header>
    <div class="main-body">
        <div class="page-wrapper">
            <?php include('pages/' . $pagina); ?>
        </div>
    </div>
</body>

</html>