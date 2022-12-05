<?php
include('lib/conexao.php');
include('lib/protect.php');
protect(0);

$id = intval($_GET['id']);

$sql_code = "SELECT * FROM compras WHERE id='$id'";
$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
$pedido = $sql_query->fetch_assoc();

if($pedido['id_cliente'] != $_SESSION['usuario']) {
    die("<script>location.href=\"index.php?p=meus_pedidos\";</script>");
}

$user_id = $pedido['id_cliente'];
$usuario = $mysqli->query("SELECT * FROM usuarios WHERE id='$user_id'")->fetch_assoc();



?>

<link rel="stylesheet" href="assets/css/painel_de_controle.css">

<div class="container">
    <div class="top">
        <div class="auth-title">
            <a href="?p=painel_de_controle"><i class="fa-solid fa-screwdriver-wrench"></i></a>/
            <span class="title">Detalhes do Pedido N° <?php echo $id ?></span>
            <br><br>
            <br>
        </div>
    </div>
    <div class="pedidos">
        <h1>Informações</h1><br>
        <hr><br>
        <p>Data do pedido: <?php echo $pedido['data_compra'] ?></p>
        <p>Status: <?php echo $pedido['status'] ?></p>
        <p>Ultima atualização: <?php echo $pedido['data_status'] ?></p><br><br>
        <h1>Endereço de entrega</h1><br>
        <hr><br>
        <p><?php echo $usuario['nome'] ?></p>
        <p><?php echo $usuario['endereco1'] ?></p>
        <p><?php echo $usuario['endereco2'] . ", " . $usuario['bairro'] ?></p>
        <p><?php echo $usuario['cidade'] . ", " . $usuario['estado'] . ", " . $usuario['cep'] ?></p><br><br>
        <h1>Produtos</h1><br>
        <hr><br>

        <div class="info-produtos">
            <?php
            $sql_code = "SELECT * FROM compras_produtos WHERE id_compra='$id'";
            $sql_query = $mysqli->query($sql_code) or die($mysqli->error);
            while ($compras_produto = $sql_query->fetch_assoc()) {
                $id_produto = $compras_produto['id_produto'];
                $produto = $mysqli->query("SELECT * FROM produtos WHERE id='$id_produto'")->fetch_assoc();
            ?>
                <div class="left">
                    <div class="pedido-img">
                        <img src="<?php echo $produto['imagem'] ?>" width="80">
                    </div>
                    <div class="pedido-content">
                        <div class="infos">
                            <h3><?php echo $produto['nome'] ?></h3>
                            <p>Quantidade: <?php echo $compras_produto['quantidade'] ?></p>
                            <p>Valor unitário: <?php echo formatar_valor($compras_produto['valor_unitario']) ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>