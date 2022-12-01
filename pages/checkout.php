<?php
include("lib/conexao.php");
include("lib/enviar_arquivo.php");
include('lib/protect.php');
protect(0);

$user_id = intval($_SESSION['usuario']);
$sql_query = $mysqli->query("SELECT * FROM usuarios WHERE id='$user_id'");
$usuario = $sql_query->fetch_assoc();

?>

<link rel="stylesheet" href="assets/css/admin_cadastro.css">
<link rel="stylesheet" href="assets/css/checkout.css">
<link rel="stylesheet" href="assets/css/table_style.css">

<div class="container">
    <div class="forms">
        <div class="form login">
            <div class="auth-content">
                <div class="auth-title">
                    <a href="index.php"><i class="fa-solid fa-house"></i></a>/<a href="?p=carrinho">carrinho</a>/
                    <span class="title">Checkout</span>
                </div>
            </div>
            <br>
            <span class="title">Resumo do pedido</span>
            <table class="content-table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                if (!empty($_SESSION["shopping_cart"])) {
                    $total = 0;
                    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                        <tr>
                            <td><img src="<?php echo $values['item_img'] ?>" alt="" width="80"></td>
                            <td><?php echo $values["item_name"]; ?></td>
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <td><?php echo formatar_valor($values["item_price"]); ?></td>
                            <td><?php echo formatar_valor($values["item_quantity"] * $values["item_price"]); ?></td>
                            <td><a href="?p=remover_item_carrinho&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                        </tr>
                    <?php
                        $total += ($values["item_quantity"] * $values["item_price"]);
                    }
                    ?>
                <?php
                } else { ?>
                    <tr>
                        <td colspan="6">Nenhum Item no carrinho!</td>
                    </tr>
                <?php } ?>
            </table>
            <div class="entrega">
                <div class="endereco-title">
                    <h2>Endereço de entrega</h2>
                </div>
                <div class="infos">
                    <p><?php echo $usuario['endereco1'] ?></p>
                    <p><?php echo $usuario['endereco2'] . ", " . $usuario['bairro'] ?></p>
                    <p><?php echo $usuario['cidade'] . ", " . $usuario['estado'] . ", " . $usuario['cep'] ?></p>
                    <a href="?p=adicionar_endereco">Alterar endereço</a>
                </div>
            </div>
            <div class="total"><h4> Total do pedido: <?php echo formatar_valor($total); ?></h4></div>
            <button>Finalizar pedido</button>
        </div>
    </div>
</div>