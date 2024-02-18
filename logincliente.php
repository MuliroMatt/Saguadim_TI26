<?php
include("conectadb.php");
session_start();
//* Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //* Obtém os dados do formulário enviado via POST
    $email = $_POST['emailcliente'];
    $senha = $_POST['senha'];

    //* Consulta o banco de dados para verificar se as credenciais do usuário são válidas
    $sql = "SELECT COUNT(cli_id) FROM clientes WHERE cli_email = '$email' AND cli_senha = '$senha'";
    $retorno = mysqli_query($link, $sql);

    //* Obtém o resultado da consulta e verifica se existe um usuário com as credenciais fornecidas
    while ($tbl = mysqli_fetch_array($retorno)) {
        $cont = $tbl[0];
    }

    //* Se existir um usuário com as credenciais válidas
    if($cont == 1){
        //* Consulta novamente o banco de dados para obter informações adicionais do usuário
        $sql = "SELECT * FROM clientes WHERE cli_email = '$email' AND cli_senha = '$senha' AND cli_status = 's'";
        $retorno = mysqli_query($link, $sql);

        //* Armazena informações do usuário na sessão
        while ($tbl = mysqli_fetch_array($retorno)) {
            $_SESSION['idcliente'] = $tbl[0];
            $_SESSION['emailcliente'] = $tbl[2];
            $_SESSION['nomecliente'] = $tbl[1];
        }

        //* Redireciona o usuário para a página 'cliente.php'
        echo "<script>window.location.href='menu.php';</script>";
    } else {
        //* Exibe uma mensagem de alerta se as credenciais do usuário forem inválidas
        echo "<script>window.alert('USUÁRIO OU SENHA INCORRETOS');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fc1c840fda.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Saguadim - Login</title>
</head>
<body>
    <main class="main-cliente">
        <div class="logo">
            <h1>saguadim</h1>
        </div>
        <div class="authentication-container">
            <div class="authentication-header">
            </div>
            <div class="form-container">
                <div class="login-container" id="login">
                    <h1 class="form-title">Login</h1>
                    <form action="logincliente.php" method="post" class="login-form">
                        <div class="input-box">
                            <p class="input-title">E-mail</p>
                            <input type="email" name="emailcliente" id="emailcliente" placeholder="Insira seu E-mail" required>
                        </div>
                        <div class="input-box">
                            <p class="input-title">Senha</p>
                            <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required>
                        </div>
                        <button class="btn" type="submit">Entrar</button>
                        <p class="account-info">
                            Não tem conta?<a href="#" id="toggleCadastra"> Cadastre-se</a>
                        </p>
                    </form>
                </div>
                <div class="signup-container" id="cadastra">
                    <h1 class="form-title.cliente">Cadastre-se</h1>
                    <form action="cadastracliente.php" method="post" class="signup-form">
                        <div class="input-box">
                            <p class="input-title">Username</p>
                            <input type="text" name="nome" id="nome" placeholder="Insira seu nome de usuário" required>
                        </div>
                        <div class="input-box">
                            <p class="input-title">E-mail</p>
                            <input type="email" name="email" id="email" placeholder="Insira seu E-mail" required>
                        </div>
                        <div class="input-box">
                            <p class="input-title">Senha</p>
                            <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required>
                        </div>
                            <input type="hidden" name="telefone" id="telefone">
                            <input type="hidden" name="sala" id="sala">
                            <input type="hidden" name="curso" id="curso">
                            <input type="hidden" name="saldo" id="saldo">
                            <input type="hidden" name="cpf" id="cpf">
                        <button class="btn">Cadastrar</button>
                        <p class="account-info">
                            Já tem uma conta?<a href="#" id="toggleLogin"> Login</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<script src="script.js">
    document.getElementById("toggleCadastra").addEventListener("click", function () {
    document.getElementById("login").style.display = "none";
    document.getElementById("cadastra").style.display = "flex";
});

document.getElementById("toggleLogin").addEventListener("click", function () {
    document.getElementById("cadastra").style.display = "none";
    document.getElementById("login").style.display = "flex";
});
</script>