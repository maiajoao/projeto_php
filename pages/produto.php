<?php
$id = intval($_GET['id']);
if ($id == 0)
    header('Location: index.php');
$sql_query = $mysqli->query("SELECT * FROM produtos WHERE id = '$id'");
$produto = $sql_query->fetch_assoc();



?>

<link rel="stylesheet" href="assets/css/paginaProduto.css">

<div class="container">
    <div class="showCase">
        <img src="<?php echo $produto['imagem'];?>" alt="product-img" id="currentImg" height="520px">
    </div>
    <div class="contentCase">
        <span class="author"><?php echo $produto['autor'];?></span>
        <h1 class="product"><?php echo $produto['nome'];?></h1>
        <label for="price" class="price">Preço:</label>
        <span class="price"><?php echo formatar_valor($produto['valor']);?></span><br>
        <div class="counter">
            <div class="button-container">
                <button class="decrease" onclick="decreaseValue()">
                    <i class="fa fa-minus"></i>
                </button>
            </div>
            <input class="quantity-product" min="1" max="99" name="quantity" value="1" type="number" id="quantity" disabled>
            <div class="button-container">
                <button class="increase" onclick="incrementValue()">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div><br>
        <button class="a2c" id="addtocart">
            Adicionar ao carrinho
        </button><br>
        <a href="">
            <button class="a2l" id="addtolist">
                <i class="fa-solid fa-star"></i>Adicionar a lista
            </button>
        </a>
        <h4>Informações do produto</h4>
        <hr>
        <p class="details"><?php echo $produto['descricao'];?></p>
    </div>
</div>

<script>
    function incrementValue() {
        var value = parseInt(document.getElementById('quantity').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('quantity').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('quantity').value, 10);
        value = isNaN(value) ? 1 : value;
        if(value > 1) {
            value--;
            document.getElementById('quantity').value = value;
        }
    }
</script>