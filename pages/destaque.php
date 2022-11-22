<?php

$sql_query = $mysqli->query("SELECT * FROM produtos WHERE categoria = 'destaque' LIMIT 16");


?>

<link rel="stylesheet" href="assets/css/pages_style.css">

<section id="hero">

    <h4>Por tempo limitado</h4>
    <h2>Ofertas imperdíveis</h2>
    <h1>Em todos os produtos</h1>
    <p>Economize pagando menos e levando mais!</p>
    <button>Compre agora</button>

</section>
<!--!PRODUTOS EM DESTAQUE -->
<div class="page-wrapper">
    <div class="content-box">
        <section id="destaques" class="section-destaques">
            <h2>Mangás em Destaque</h2>
            <p>Nossos produtos mais procurados</p>
            <div class="container-produto">
                <?php while($destaque = $sql_query->fetch_assoc()) { ?>
                <div class="produto">
                    <a href="<?php echo '?p=produto&id=' . $destaque['id'] ?>"><img src="upload/<?php echo $destaque['imagem'] ?>" alt="<?php echo $destaque['nome'] ?>"></a>
                    <div class="desc-produto">
                        <span><?php echo $destaque['nome'] ?></span>
                        <h4>R$ <?php echo $destaque['valor'] ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                </div> <?php } ?>
            </div>
        </section>
    </div>
</div>
