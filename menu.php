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
    <header>
        <div class="header-container">
            <div class="logo">
                <h1>Saguadim</h1>
            </div>
            <div class="header-links">
                <ul>
                    <li><a href="">início</a></li>
                    <li><a href="menu.php">menu</a></li>
                    <li><a href="cliente.php">perfil</a></li>
                </ul>
            </div>
        </div>
    </header>
    <main class="menu-container">
        
        <div class="produtos">
            <h2>Pastel</h2>
            <h3>R$5,00</h3>
        </div>
        
    </main>
</body>
</html>