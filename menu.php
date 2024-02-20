<?php 
    include("cabecalhocliente.php");


    $sql = "SELECT * FROM produtos WHERE pro_status = 's'";
    $retorno = mysqli_query($link, $sql);

    if(isset($_GET['produto'])){
        // echo 'deu bom';
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM produtos WHERE pro_id = $id";
        $retorno2 = mysqli_query($link, $sql2);
        while ($tbl = mysqli_fetch_array($retorno2)){
            $nome = $tbl[1];
            $desc = $tbl[2];
            $preco = $tbl[4];
            echo "<script>let preco = '$preco';</script>";
        }
    }

    
    

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
    if(isset($id)){
    ?>
    <div onclick="overlayOff()" class="product-overlay" id="overlay">
        <div onclick="event.stopPropagation()" class="product-display">
            <header class="display-header">
                <h3 class="display-title"><?=$nome?></h3>
                <a href="menu.php" class="close-btn" onclick="overlayOff()"><i class="bi bi-x"></i></a>
            </header>
            <div class="infos">
                <span class="description"><?=$desc?></span>
                <span class="price">R$ <?=$preco?></span>
            </div>
            <hr>
            <div class="display-bottom">
                <form action="adiciona.php" method="post">
                    <input type="hidden" name="id-produto" value="<?=$id?>">
                    <input type="hidden">
                    <div class="count-btn">
                        <button type="button" class="decrease-btn" id="decrement" onclick="stepper(this)">-</button>
                        <input type="number" min="1" max="100" value="1" id="my-input" name="quantidade" step="1" readonly>
                        <button type="button" class="increase-btn" id="increment" onclick="stepper(this)">+</button>
                    </div>
                    <button id="myBtn" name="btn" class="add-to-cart-btn" value="<?=$preco?>"><span class="text">Adicionar</span> <span id="btn-price">R$ <?=$preco?></span></button>
                </form>
            </div>
        </div>
    </div>
    <?php 
    }
    ?>
    <main class="main-menu">
        <div class="wrapper">
            <h1 class="title">Salgados</h1>
            <div class="grid-products">
                <?php 
                while ($tbl = mysqli_fetch_array($retorno)) {
                ?>
                <form action="menu.php" method="get">
                    <div class="product">
                        <button type="submit" name="produto"></button>
                        <input type="hidden" name="id" value="<?=$tbl[0]?>">
                        <div class="infos">
                            <div class="info-top">
                                <h3 class="name"><?=$tbl[1]?></h3>
                                <span class="description"><?=$tbl[2]?></span>
                            </div>
                            <span class="price">R$ <?=$tbl[4]?></span>
                        </div>
                        <div class="img-box">
                            <!-- <img src="coxinha.jpg"> -->
                        </div>
                    </div>
                </form>
                <?php 
                }
                ?>
            </div>
        </div>
    </main>
    <script>

        const myInput = document.getElementById("my-input");

        function stepper(btn){
            let id = btn.getAttribute("id");
            let min = myInput.getAttribute("min");
            let max = myInput.getAttribute("max");
            let step = myInput.getAttribute("step");
            let val = myInput.getAttribute("value");
            let calcStep = (id === "increment") ? (step * 1) : (step * -1);
            let newValue = parseInt(val) + calcStep;

            if (newValue >= min && newValue <= max) {
                myInput.setAttribute("value", newValue);
                let result = (preco * newValue).toFixed(2)
                myBtn.setAttribute("value", result);
                document.getElementById('btn-price').innerText = 'R$ ' + result
            }
        }
        
    </script>
</body>
</html>
