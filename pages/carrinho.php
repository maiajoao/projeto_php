
<link rel="stylesheet" href="assets/css/table_style.css" />
<div class="page-wrapper">
    <div class="content-box">
        <table class="content-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
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
                <tr>
                    <td colspan="4" align="right">Total</td>
                    <td align="right"><?php echo formatar_valor($total) ?></td>
                    <td></td>
                </tr>
            <?php
            } else { ?>
                <tr>
                    <td colspan="6">Nenhum Item no carrinho!</td>
                </tr>
            <?php } ?> 
        </table>
    </div>
</div>