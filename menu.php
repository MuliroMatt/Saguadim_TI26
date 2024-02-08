<?php 
    include("conectadb.php");

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
    <?php 
        include("cabecalhocliente.php");
    ?>
    <main class="menu-container">
        <div class="grid-produtos">
        <?php
        while ($tbl = mysqli_fetch_array($retorno)) {
        ?>
            <div class="produtos">

                <h2><?=$tbl[1]?></h2>
                <h3>R$<?=$tbl[4]?></h3>
            </div>
            <?php 
        }
        ?>
        </div>
        
    </main>
</body>
</html>