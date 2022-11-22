<?php

include('lib/conexao.php');
include('lib/protect.php');
protect(1);

$sql_usuarios = "SELECT * FROM produtos";
$sql_query = $mysqli->query($sql_usuarios) or die($mysqli->error);
$num_produtos = $sql_query->num_rows;

?>

<link rel="stylesheet" href="assets/css/table_style.css" />
<div class="page-wrapper">
    <div class="content-box">
        <div class="admin">
            <a href="#">Cadastrar produto</a>
            <form action="" method="GET" class="admin-search">
                <input type="hidden" name="p" value="gerenciar_produtos">
                <input type="text" name="search" value="<?php if(isset($_GET['search'])) echo $_GET['search'];?>" placeholder="Digite o filtro" />
                <input type="submit" value="Enviar">
            </form>
        </div>
        <table class="content-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>IMAGEM</th>
                    <th>NOME</th>
                    <th>VALOR</th>
                    <th>ESTOQUE</th>
                    <th>CATEGORIA</th>
                    <th>DATA DE CADASTRO</th>
                    <th colspan="2">AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(!isset($_GET['search'])) {
                    if($num_produtos == 0) { ?>
                    <tr>
                        <td colspan="9">Nenhum produto cadastrado!</td>
                    </tr>
                <?php 
                    } else { 
                        while($produto = $sql_query->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $produto['id'] ?></td>
                    <td><img src="upload/<?php echo $produto['imagem'] ?>" alt="" width="80"></td>
                    <td><?php echo $produto['nome'] ?></td>
                    <td><?php echo formatar_valor($produto['valor']) ?></td>
                    <td><?php echo $produto['estoque'] ?></td>
                    <td><?php echo $produto['categoria'] ?></td>
                    <td><?php echo formatar_data($produto['data_cadastro']) ?></td>
                    <td><a href="">Editar</a></td>
                    <td><a href="">Deletar</a></td>
                </tr>
                <?php
                        }
                    }
                } else {
                    $pesquisa = $mysqli->real_escape_string($_GET['search']);
                    $sql_code = "SELECT * FROM produtos
                                WHERE nome LIKE '%$pesquisa%' 
                                OR categoria LIKE '%$pesquisa%'
                                OR id LIKE '%$pesquisa%'";
                    $sql_query = $mysqli->query($sql_code) or die("ERRO ao consultar! " . $mysqli->error);
            
                    if ($sql_query->num_rows == 0) {
                        ?>
                <tr>
                    <td colspan="9">Nenhum resultado encontrado...</td>
                </tr>
                <?php } else {
                    while($produto = $sql_query->fetch_assoc()) {
                        ?>
                <tr>
                    <td><?php echo $produto['id'] ?></td>
                    <td><img src="upload/<?php echo $produto['imagem'] ?>" alt="" width="80"></td>
                    <td><?php echo $produto['nome'] ?></td>
                    <td><?php echo formatar_valor($produto['valor']) ?></td>
                    <td><?php echo $produto['estoque'] ?></td>
                    <td><?php echo $produto['categoria'] ?></td>
                    <td><?php echo formatar_data($produto['data_cadastro']) ?></td>
                    <td><a href="">Editar</a></td>
                    <td><a href="">Deletar</a></td>
                </tr>
                <?php
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>