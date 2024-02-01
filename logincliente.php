<?php
    

    include("conectadb.php");

    $sql = "SELECT * FROM clientes WHERE cli_status = 's'";
    $retorno = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/fc1c840fda.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Saguadim - Login adm</title>
</head>
<body>
    <main class="main-wrapper">
        <div class="logo">
            <h1>saguadim</h1>
        </div>
        <div class="authentication-container">
            <div class="authentication-header">
            </div>
            <div class="form-container cliente">
                <div class="login-container cliente" id="login">
                    <h1 class="form-title cliente">Login</h1>
                    <form action="logincliente.php" method="post" class="login-form">
                        <p class="input-title">E-mail</p>
                        <div class="input-box">
                            <input type="email" name="email" id="email" placeholder="Insira seu E-mail" required>
                        </div>
                        <p class="input-title">Senha</p>
                        <div class="input-box">
                            <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required>
                        </div>
                        <!-- <button class="btn">Entrar</button> -->
                        <a href="cliente.php?id=<?=$tbl[0] ?>"><button class="btn">Entrar</button></a>
                    </form>
                    <p class="account-info">
                        Não tem conta?<a href="#" id="toggleCadastra"> Cadastre-se</a>
                    </p>
                </div>
                <div class="signup-container" id="cadastra">
                    <h1 class="form-title.cliente">Cadastre-se</h1>
                    <form action="cadastracliente.php" method="post" class="signup-form">
                        <p class="input-title">Username</p>
                        <div class="input-box">
                            <input type="text" name="nome" id="nome" placeholder="Insira seu nome de usuário" required>
                        </div>
                        <p class="input-title">E-mail</p>
                        <div class="input-box">
                            <input type="email" name="email" id="email" placeholder="Insira seu E-mail" required>
                        </div>
                        <p class="input-title">Senha</p>
                        <div class="input-box">
                            <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required>
                        </div>
                        
                            <input type="hidden" name="telefone" id="telefone">
                            <input type="hidden" name="sala" id="sala">
                            <input type="hidden" name="curso" id="curso">
                            <input type="hidden" name="saldo" id="saldo">
                            <input type="hidden" name="cpf" id="cpf">

                        <button class="btn">Cadastrar</button>
                    </form>
                    <p class="account-info">
                        Já tem uma conta?<a href="#" id="toggleLogin"> Login</a>
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="script.js"></script>
</html>

