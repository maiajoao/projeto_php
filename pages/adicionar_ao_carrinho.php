<?php

include('lib/conexao.php');
$id = intval($_POST['id']);

$sql_query = $mysqli->query("SELECT * FROM produtos WHERE id = '$id'");
if($sql_query->num_rows==0) {
    die("<script>location.href=\"index.php?p=produto&id=$id\";</script>");
}
$produto = $sql_query->fetch_assoc();

if(isset($_SESSION["shopping_cart"]))
{
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if(!in_array($id, $item_array_id))
    {
        $item_array = array(
            'item_id'			=>	$id,
            'item_name'			=>	$produto['nome'],
            'item_price'		=>	$produto['valor'],
            'item_quantity'		=>	$_POST["quantity"],
            'item_img'          =>  $produto['imagem']
        );
        $_SESSION["shopping_cart"][$id] = $item_array;
    }
    else
    {
        $key = array_search($id , $item_array_id);
        $_SESSION['shopping_cart'][$key]['item_quantity'] += $_POST['quantity'];
    }
}
else
{
    $item_array = array(
        'item_id'			=>	$id,
        'item_name'			=>	$produto['nome'],
        'item_price'		=>	$produto['valor'],
        'item_quantity'		=>	$_POST["quantity"],
        'item_img'          =>  $produto['imagem']
    );
    $_SESSION["shopping_cart"][$id] = $item_array;
}
die("<script>location.href=\"index.php?p=produto&id=$id\";</script>");  

?>
