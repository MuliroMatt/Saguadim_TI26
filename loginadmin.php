<?php
//*INICIA VARIAVEL DE SESSÃO
session_start();

//*INCLUE CÓDIGO DE CONEXÃO DO BANCO
include("conectadb.php");

//*APÓS CLICK NO FORM POST
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //*QUERY DE VALIDA SE USUÁRIO EXISTE
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = '$email' AND usu_senha = '$senha' AND usu_status = 's'";
    $retorno = mysqli_query($link, $sql);

    //*SUGESTÃO ARIEL DE SANITIZAÇÃO
    $retorno = mysqli_fetch_array($retorno)[0];
    
    //*GRAVA LOG  
    $sql = '"'.$sql.'"';
    $sqllog = "INSERT INTO tab_log (tab_query, tab_data) VALUES ($sql, NOW())";
    mysqli_query($link, $sqllog);

    //*SE USUÁRIO NÃO EXISTE LOGA, SE NÃO, NÃO LOGA
    if($retorno == 0){
        echo"<script>window.alert('USUÁRIO INCORRETO');</script>";
        echo"<script>window.location.href='loginadmin.php';</script>";

    }
    else{
        $sql = "SELECT * FROM usuarios WHERE usu_email = '$email' AND usu_senha = '$senha' AND usu_status = 's'";
        $retorno = mysqli_query($link, $sql);

        //*GRAVA LOG
        $sql = '"'.$sql.'"';
        $sqllog = "INSERT INTO tab_log (tab_query, tab_data) VALUES ($sql, NOW())";
        mysqli_query($link, $sqllog);
        while($tbl = mysqli_fetch_array($retorno)){
            $_SESSION['idusuario'] = $tbl[0];
            $_SESSION['nomeusuario'] = $tbl[1];
            $nomeusuario = $tbl[1];
        }
        echo"<script>window.location.href='backoffice.php';</script>";
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
    <title>Saguadim - Login adm</title>
</head>
<body>
    <main class="main-admin">
        <div class="logo">
            <h1>saguadim</h1>
            <p>Admin</p>
        </div>
        <div class="authentication-container">
            <div class="authentication-header">
            </div>
            <div class="form-container">
                <?php 
                if(empty($_SESSION['idusuario'])){
                ?>
                <div class="login-container" id="login">
                    <h1 class="form-title">Login</h1>
                    <form action="loginadmin.php" method="post" class="login-form">
                        <div class="input-box">
                            <p class="input-title">E-mail</p>
                            <input type="email" name="email" id="email" placeholder="Insira seu E-mail" required>
                        </div>
                        <div class="input-box">
                            <p class="input-title">Senha</p>
                            <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required>
                        </div>
                        <button class="btn">Entrar</button>
                    </form>
                </div>
                <?php
                }
                else{
                ?>
                <p>Você já está logado como <strong><?=$_SESSION['nomeusuario']?></strong>. <a href="logout.php">Logout</a></p>
                <?php 
                }
                ?>
            </div>
        </div>
    </main>
</body>
<script src="script.js"></script>
</html>
