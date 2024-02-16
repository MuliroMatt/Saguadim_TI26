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
    <main class="main-menu">
        <div class="wrapper">
            <h1 class="title">Salgados</h1>
            <div class="grid-products">
                <?php 
                while ($tbl = mysqli_fetch_array($retorno)) {
                ?>
                <a href="" class="product">
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
                </a>
                <?php 
                }
                ?>
            </div>
        </div>
    </main>
</body>
</html>