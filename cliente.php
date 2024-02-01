<?php
include("cabecalho2.php");

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
    echo "<script>window.location.href='listacliente.php';</script>";
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