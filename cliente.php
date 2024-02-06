<?php
include("conectadb.php");
session_start();

$id = $_SESSION['idusuario']; 

$sql = "SELECT * FROM clientes WHERE cli_id = '$id'";
$retorno = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($retorno)) {
    $nome =  $tbl[1];
    $email =  $tbl[2];
    $telefone =  $tbl[3];
    $cpf =  $tbl[4];
    $curso =  $tbl[5];
    $sala =  $tbl[6];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $curso = $_POST['curso'];
    $sala = $_POST['sala'];
    
    $sql = "UPDATE clientes SET cli_nome = '$nome', cli_email = '$email', cli_telefone = '$telefone', cli_cpf = '$cpf',
    cli_curso = '$curso', cli_sala = '$sala' WHERE cli_id = '$id'";
    
    mysqli_query($link, $sql); 
    
    echo "<script>window.alert('Dados alterados com sucesso!');</script>";
}
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
                    <h1><?=$nome?></h1>
                </div>
                <div class="user-list">
                    <ul>
                        <li><button onclick="togglePerfil()">Meu Perfil</button></li>
                         <li><button onclick="toggleInfo()">Minhas Informações</button></li> 
                        <li><button onclick="togglePedidos()">Meus Pedidos</button></li>
                        <li><a href="logoutcliente.php">Sair</a></li>
                    </ul>
                </div>
            </div>
            <div class="perfil" id="perfil">
                <h1>Perfil</h1>
            </div>
            <div class="user-info" id="user-info">
                <form action="cliente.php" method="post" class="cliente-form">
                    <h1>Informações do usuário</h1>
                    <div class="cliente-input">
                        <input type="hidden" name="id">
                        <div class="input-box">
                            <input type="text" name="nome" placeholder="Nome" value="<?=$nome?>" required>
                        </div>
                        <div class="input-box">
                            <input type="email" name="email" placeholder="E-mail" value="<?=$email?>" required>
                        </div>
                        <div class="input-box telefone">
                            <input type="text" name="telefone" placeholder="Telefone" id="telefone" value="<?=$telefone?>" required>
                        </div>
                        <div class="input-box cpf">
                            <input type="text" name="cpf" placeholder="CPF" id="cpf" value="<?=$cpf?>" required>
                        </div>
                        <div class="input-box curso">
                            <input type="text" name="curso" placeholder="Curso" value="<?=$curso?>" required>
                        </div>
                        <div class="input-box sala">
                            <input type="text" name="sala" placeholder="Sala" value="<?=$sala?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn">Alterar Informações</button>
                </form>
            </div>
            <div class="user-pedidos" id="pedidos">
                <h1>Pedidos</h1>
            </div>
        </div>
    </main>
</body>
<script src="script.js"></script>
</html>