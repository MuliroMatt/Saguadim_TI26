<?php
include("conectadb.php");
session_start();

// Check if the keys are set in the $_SESSION array
$idusuario = isset($_SESSION['idusuario']) ? $_SESSION['idusuario'] : null;
$nomeusuario = isset($_SESSION['nomeusuario']) ? $_SESSION['nomeusuario'] : null;
echo($idusuario)
// Now you can use $idusuario and $nomeusuario safely
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                    <li><a href="">menu</a></li>
                    <li><a href="">perfil <i class="bi bi-person-circle"></i></a></li>
                </ul>
            </div>
        </div>
    </header>
    <main class="cliente-container">
        <div class="wrapper">
            <div class="perfil-container">
                <div class="user">
                    <div class="perfil-pic">
                        <i class="bi bi-person"></i>
                    </div>
                    <h1>Usuário</h1>
                </div>
                <div class="user-list">
                    <ul>
                        <li><button>Meu Perfil</button></li>
                        <li><button>Minhas Informações</button></li>
                        <li><button>Meus Pedidos</button></li>
                        <li><a href="logoutcliente.php">Sair</a></li>
                    </ul>
                </div>
            </div>
            <div class="user-info">
                <form action="alteracliente.php" method="post" enctype="multipart/form-data" class="cliente-form">
                    <h1>Informações do usuário</h1>
                    <div class="cliente-input">
                        <input type="hidden" name="id" value="">
                        <div class="input-box" id="input-box-name">
                            <input type="text" name="nome" id="nome" placeholder="Nome">
                        </div>
                        <div class="input-box" id="input-box-email">
                            <input type="email" name="email" id="email" placeholder="E-mail">
                        </div>
                        <div class="input-box telefone" id="input-box-tel">
                            <input type="" name="telefone" id="telefone" placeholder="Telefone">
                        </div>
                        <div class="input-box cpf" id="input-box-cpf">
                            <input id="login-email" type="text" name="cpf" placeholder="CPF">
                            <i class='bx bxs-mail'></i>
                        </div>
                        <div class="input-box curso" id="input-box-curso">
                            <input id="login-email" type="text" name="curso" placeholder="Curso">
                            <i class='bx bxs-mail'></i>
                        </div>
                        <div class="input-box sala" id="input-box-email">
                            <input id="login-email" type="text" name="sala" placeholder="Sala">
                            <i class='bx bxs-mail'></i>
                        </div>
                    </div>
                    <button type="submit" class="btn">Alterar Informações</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>