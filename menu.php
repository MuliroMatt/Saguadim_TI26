<?php 
    include("cabecalhocliente.php");


    $sql = "SELECT * FROM produtos WHERE pro_status = 's'";
    $retorno = mysqli_query($link, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Saguadim</title>
</head>
<body>
    <div onclick="overlayOff()" class="product-overlay" id="overlay">
        <div onclick="event.stopPropagation()" class="product-display">
            <header class="display-header">
                <h3 class="display-title">Produto</h3>
                <button class="close-btn" onclick="overlayOff()"><i class="bi bi-x"></i></button>
            </header>
            <div class="infos">
                <span class="description">Descrição Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores, rem suscipit facilis optio ad aliquid laborum excepturi voluptates autem tempora voluptas, aliquam delectus recusandae repudiandae porro sed, voluptatem quaerat. Inventore?</span>
                <span class="price">R$ 0,00</span>
            </div>
            <hr>
            <div class="display-bottom">
                <form action="">
                    <div class="count-btn">
                        <button type="button" class="decrease-btn" id="decrement" onclick="stepper(this)">-</button>
                        <input type="number" min="1" max="100" value="1" id="my-input" readonly>
                        <button type="button" class="increase-btn" id="increment" onclick="stepper(this)">+</button>
                    </div>
                    <button class="add-to-cart-btn"> <span class="text">Adicionar</span> <span class="price">R$ 0,00</span></button>
                </form>
            </div>
        </div>
    </div>
    <main class="main-menu">
        <div class="wrapper">
            <h1 class="title">Salgados</h1>
            <div class="grid-products">
                <?php 
                while ($tbl = mysqli_fetch_array($retorno)) {
                ?>
                <div onclick="overlayOn()" class="product">
                    <div class="infos">
                        <div class="info-top">
                            <h3 span class="name"><?=$tbl[1]?></h3>
                            <span class="description"><?=$tbl[2]?></span>
                        </div>
                        <span class="price">R$ <?=$tbl[4]?></span>
                    </div>
                    <div class="img-box">
                        <!-- <img src="coxinha.jpg"> -->
                    </div>
                </div>
                <?php 
                }
                ?>
            </div>
        </div>
    </main>
</body>
</html>

<script src="script.js"></script>