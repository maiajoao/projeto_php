<?php

include('lib/conexao.php');
include('lib/protect.php');

protect(1);


if (!isset($_GET['row']) || $_GET['row'] == 1) {
    $sql_usuarios = "SELECT * FROM produtos LIMIT 8";
} else {
    $inicial = (intval($_GET['row']) * 8) - 8;
    $sql_usuarios = "SELECT * FROM produtos LIMIT $inicial, 8";
}

$sql_query = $mysqli->query($sql_usuarios) or die($mysqli->error);
$num_produtos = $mysqli->query("SELECT * FROM produtos")->num_rows;

?>



<link rel="stylesheet" href="assets/css/pagina_pesquisar.css" />


<div class="page-wrapper">
    <div class="content-box">
        <br><br>
        <h1>Encontre Aqui o Produto que Você Deseja!</h1> <br>
        <section id="destaques" class="section-destaques">
            <div class="container-produto">
                <?php
                if (!isset($_GET['search'])) {


                    if ($num_produtos == 0) { ?>
                        <tr>
                            <td colspan="10">Nenhum produto cadastrado!</td>
                        </tr>
                        <?php
                    } else {
                        while ($produto = $sql_query->fetch_assoc()) {
                        ?>
                            <div class="produto">
                                <a href="index.php?p=produto&id=<?php echo $produto['id'] ?>">
                                    <img src="<?php echo $produto['imagem'] ?>" alt=" <?php echo $produto['nome'] ?>" height="350px">
                                    <div class="informaçao-produto">
                                        <span><?php echo $produto['nome'] ?></span>
                                        <h4>R$ <?php echo formatar_valor($produto['valor']) ?></h4>
                                    </div>
                                </a>


                                <form action="?p=adicionar_ao_carrinho" id="stock-form" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $produto['id'] ?>">
                                    <input type="hidden" name="quantity" value="1" type="number" id="quantity">
                                    <button class="bnt" type="submit">Adicionar ao Carrinho</button>
                                </form>
                            </div> <?php
                                }
                            }
                        } else {

                            $pesquisa = $mysqli->real_escape_string($_GET['keyword']);
                            if (!isset($_GET['row']) || $_GET['row'] <= 1) {
                                $sql_code = "SELECT * FROM produtos
                                    WHERE nome LIKE '%$pesquisa%' 
                                    OR id LIKE '%$pesquisa%  '
                                    LIMIT 8";
                            } else {
                                $inicial = (intval($_GET['row']) * 8) - 8;
                                $sql_code = "SELECT * FROM produtos
                                    WHERE nome LIKE '%$pesquisa%' 
                                    OR id LIKE '%$pesquisa%'
                                    LIMIT $inicial, 8";
                            }
                            $num_pesquisa = ($mysqli->query("SELECT * FROM produtos
                                    WHERE nome LIKE '%$pesquisa%' 
                                     OR id LIKE '%$pesquisa%'"))->num_rows;
                            $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error);


                            $qtd_resultado = $sql_query->num_rows;
                            if ($qtd_resultado == 0) {
                                    ?>
                        <div class="sem-resultado">
                            <tr>
                                <td colspan="10">Nenhum resultado encontrado...</td>
                            </tr>
                        </div>
                        <?php } else {
                                while ($produto = $sql_query->fetch_assoc()) {
                        ?>
                            <div class="produto">
                                <a href="index.php?p=produto&id=<?php echo $produto['id'] ?>">
                                    <img src="<?php echo $produto['imagem'] ?>" alt=" <?php echo $produto['nome'] ?>" height="350px">
                                    <div class="informaçao-produto">
                                        <span><?php echo $produto['nome'] ?></span>
                                        <h4>R$ <?php echo formatar_valor($produto['valor']) ?></h4>
                                </a>
                                <form action="?p=adicionar_ao_carrinho" id="stock-form" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $produto['id'] ?>">
                                    <input type="hidden" name="quantity" value="1" type="number" id="quantity">
                                    <button class="bnt" type="submit">Adicionar ao Carrinho</button>
                                </form>


                            </div>



            </div>
<?php
                                }
                            }
                        } ?>
        </section>
    </div>
</div>