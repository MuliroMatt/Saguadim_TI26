<?php
include("cabecalhocliente.php");

session_start();

if(isset($_SESSION['idcliente'])){
    $id = $_SESSION['idcliente']; 
    
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
    <main class="cliente-container">
        <div class="wrapper">
        <?php 
        if(isset($id)){
        ?>
        <div class="wrapper-perfil">
            <div class="perfil-container">
                <div class="user">
                    <div class="perfil-pic">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <h1><?=$nome?></h1>
                </div>
                <div class="user-list">
                    <ul>
                        <li><button onclick="toggleInfo()">Meu Perfil</button></li> 
                        <li><button onclick="togglePedidos()">Meus Pedidos</button></li>
                        <li><a href="logoutcliente.php">Sair</a></li>
                    </ul>
                </div>
            </div>
            <div class="perfil" id="perfil">
                <div class="user-card">
                    <h1>Meu Perfil</h1>
                    <i class="bi bi-person"></i>
                    <button onclick="toggleInfo()">Ver perfil</button>
                </div>
                <div class="pedidos-card">
                    
                </div>
                <div class="pedidos-card">
                    <h1>Meus pedidos</h1>
                    <i class="bi bi-bag"></i>
                    <button onclick="togglePedidos()">Ver pedidos</button>
                </div>
            </div>
            <div class="user-info" id="user-info">
                <div class="back">
                    <button class="leave-btn" onclick="togglePerfil()"><i class="bi bi-x"></i></button>
                </div>
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
                <div class="back">
                    <button class="leave-btn" onclick="togglePerfil()"><i class="bi bi-x"></i></button>
                </div>
                <h1>Pedidos</h1>
            </div>
        </div>
        <?php
        }
        else{
        ?>
        <div class="login-cliente">
            <div class="title">
                <h1>Faça Login</h1>
                <p>Faça seu login para ter acesso ao seu perfil e suas encomendas</p>
            </div>
            <form action="logincliente.php" method="post" class="form-cliente">
                <p class="input-title">E-mail</p>
                <div class="input-box">
                    <input type="email" name="emailcliente" id="emailcliente" placeholder="Insira seu E-mail" required>
                </div>
                <p class="input-title">Senha</p>
                <div class="input-box">
                    <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required>
                </div>
                <!-- <button class="btn">Entrar</button> -->
                <button class="btn" type="submit">Entrar</button>
            </form>
        </div>
        <?php 
        }
        ?>
        </div>
    </main>
</body>
<script src="script.js"></script>
</html>