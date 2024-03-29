<?php
include("cabecalho.php");

//* Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //* Obtém os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $curso = $_POST['curso'];
    $sala = $_POST['sala'];
    $saldo = $_POST['saldo'];
    $status = $_POST['status'];

    //* Atualiza os dados no banco de dados
    $sql = "UPDATE clientes SET cli_nome = '$nome', cli_email = '$email', cli_telefone = '$telefone', cli_cpf = '$cpf',
    cli_curso = '$curso', cli_sala = '$sala', cli_saldo = '$saldo', cli_status = '$status'";

    $sql .= " WHERE cli_id = $id";

    //* Executa a query de atualização no banco de dados
    mysqli_query($link, $sql);

    //* Exibe alerta de sucesso e redireciona para a lista de clientes
    echo "<script>window.alert('Cliente alterado com sucesso!');</script>";
    echo "<script>window.location.href='listacliente.php';</script>";
}

//* Obtém o ID do cliente a ser alterado da query string
$id = $_GET['id'];

//* Consulta os dados do cliente específico no banco de dados
$sql = "SELECT * FROM clientes WHERE cli_id = '$id'";
$retorno = mysqli_query($link, $sql);

//* Obtém os dados do cliente para preencher o formulário
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
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        
        <title>ALTERA USUÁRIO</title>
    </head>
    <body>
        <div class="cadastra-container">
            <div class="wrapper">
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
                    <!-- Verifica se o usuário está ativo ou não -->
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
    </body>
</html>
