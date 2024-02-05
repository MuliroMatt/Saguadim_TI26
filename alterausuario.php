<?php
include("cabecalho.php");

//* Verifica se a requisição é do tipo POST 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //* Obtém os dados do formulário 
    $id = $_POST['id'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    //* Atualiza os dados no banco de dados
    $sql = "UPDATE usuarios SET usu_login = '$login', usu_senha = '$senha', usu_email = '$email', usu_status = '$status'";
    $sql .= " WHERE usu_id = $id";

    //* Executa a query de atualização no banco de dados
    mysqli_query($link, $sql);

    //* Exibe alerta de sucesso e redireciona para a lista de usuários
    echo "<script>window.alert('Usuário alterado com sucesso!');</script>";
    echo "<script>window.location.href='listausuario.php';</script>";
}

//* Obtém o ID do usuário a ser alterado da query string
$id = $_GET['id'];

//* Consulta os dados do usuário específico no banco de dados
$sql = "SELECT * FROM usuarios WHERE usu_id = '$id'";
$retorno = mysqli_query($link, $sql);

//* Obtém os dados do usuário para preencher o formulário
while ($tbl = mysqli_fetch_array($retorno)) {
    $login = $tbl[1];
    $senha = $tbl[2];
    $email = $tbl[5];
    $status = $tbl[3];
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
                <form action="alterausuario.php" method="post" enctype="multipart/form-data" class="cadastra-form">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <h3>Usuário</h3>
                    <div class="input-box" id="input-box-name">
                        <input type="text" name="login" id="login" value="<?=$login?>">
                    </div>
                    <h3>Senha</h3>
                    <div class="input-box" id="input-box-name">
                        <input type="password" name="senha" id="senha" value="<?=$senha?>">
                    </div>
                    <h3>E-mail</h3>
                    <div class="input-box" id="input-box-preco">
                        <input type="email" name="email" id="email" value="<?=$email?>">
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
