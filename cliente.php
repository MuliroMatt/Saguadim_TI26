<?php
include("conectadb.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $curso = $_POST['curso'];
    $sala = $_POST['sala'];
    $saldo = $_POST['saldo'];
    $status = $_POST['status'];

    // Atualiza os dados no banco de dados
    $sql = "UPDATE clientes SET cli_nome = '$nome', cli_email = '$email', cli_telefone = '$telefone', cli_cpf = '$cpf',
    cli_curso = '$curso', cli_sala = '$sala', cli_saldo = '$saldo', cli_status = '$status'";

    $sql .= " WHERE cli_id = $id";

    mysqli_query($link, $sql);

    echo "<script>window.alert('cliente alterado com sucesso!');</script>";
}

$id = $_GET['id'];
$sql = "SELECT * FROM clientes WHERE cli_id = '$id'";
$retorno = mysqli_query($link, $sql);

while ($tbl = mysqli_fetch_array($retorno)) {
    $nome =  $tbl[1];
    $email =  $tbl[2];
    $telefone =  $tbl[3];
    $cpf =  $tbl[4];
    $curso =  $tbl[5];
    $sala =  $tbl[6];
    $saldo =  $tbl[8];
    $status =  $tbl[7];
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
                    <h1>Usuário</h1>
                </div>
                <div class="user-list">
                    <ul>
                        <li><button>Meu Perfil</button></li>
                        <li><button>Meus Pedidos</button></li>
                        <li><a href="logoutcliente.php">Sair</a></li>
                    </ul>
                </div>
            </div>
            <div class="user-info">
                <form action="alteracliente.php" method="post" enctype="multipart/form-data" class="cadastra-form">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <h3>Cliente</h3>
                    <div class="input-box" id="input-box-name">
                        <input type="text" name="nome" id="nome" value="<?=$nome?>">
                    </div>
                    <h3>E-mail</h3>
                    <div class="input-box" id="input-box-preco">
                        <input type="email" name="email" id="email" value="<?=$email?>">
                    </div>
                    <h3>Telefone</h3>
                    <div class="input-box" id="input-box-name">
                        <input type="number" name="telefone" id="telefone" value="<?=$telefone?>">
                    </div>
                    <h3>CPF</h3>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="text" name="cpf" placeholder="000-000-000-00">
                        <i class='bx bxs-mail'></i>
                    </div>
                    <h3>Curso</h3>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="text" name="curso" placeholder="Curso">
                        <i class='bx bxs-mail'></i>
                    </div>
                    <h3>Sala</h3>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="text" name="sala" placeholder="Sala">
                        <i class='bx bxs-mail'></i>
                    </div>
                    <h3>Saldo</h3>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="number" name="saldo" placeholder="Saldo">
                        <i class='bx bxs-mail'></i>
                    </div>
                    <h3>Status: <?= $status == 's' ? "Ativo" : "Inativo" ?></h3>
                    <div class="form-container">
                        <input type="radio" name="status" class="radio" value="s" id="radioativo" <?= $status == 's' ? "checked" : "" ?>>
                        <label class="radio-label" for="radioativo">Ativo</label>
                        <input type="radio" name="status" class="radio" value="n" id="radioinativo" <?= $status == 'n' ? "checked" : "" ?>>
                        <label class="radio-label" for="radioinativo">Inativo</label>
                    </div>
                    <button type="submit" class="btn">Alterar</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>