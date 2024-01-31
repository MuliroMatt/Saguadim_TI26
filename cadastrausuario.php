
<?php
include("cabecalho.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $login = $_POST['login'];
    
    $key = RAND(100000,999999);

    //*INSERIR INSTRUÇÕES NO BANCO  
    $sql = "SELECT COUNT(usu_id) FROM usuarios WHERE usu_email = '$email' OR usu_login = '$login'";
    $resultado = mysqli_query($link, $sql);
    $resultado = mysqli_fetch_array($resultado) [0];
    //*GRAVA LOG  
    $sql = '"'.$sql.'"';
    $sqllog = "INSERT INTO tab_log (tab_query, tab_data) VALUES ($sql, NOW())";
    mysqli_query($link, $sqllog);
    //*VERIFICA SE EXISTE
    if($resultado >= 1){
        echo"<script>window.alert('EMAIL JÁ CADASTRADO');</script>";
        echo"<script>window.location.href='listausuario.php';</script>";
    }
    else{
        $sql = "INSERT INTO usuarios(usu_login, usu_senha, usu_status, usu_key, usu_email) 
                VALUES('$login','$senha','s','$key','$email')";
        mysqli_query($link, $sql);

         //*GRAVA LOG
        $sql ='"'.$sql.'"';
        $sqllog ="INSERT INTO tab_log (tab_query, tab_data) VALUES ($sql, NOW())";
        mysqli_query($link, $sqllog);

        echo"<script>window.alert('USUARIO CADASTRADO');</script>";
        echo"<script>window.location.href='listausuario.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>CADASTRO DE USUÁRIO</title>
    </head>
    <body>
        <div class="cadastra-container">
            <div class="wrapper">
                <form action="cadastrausuario.php" method="post"  class="cadastra-form">
                    <h1>Registrar usuário</h1>
                    <div class="input-box" id="input-box-name">
                        <input id="login-name" type="text" name="login" placeholder="Nome" required>
                    </div>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-box" id="input-box-password">
                        <input id="login-password" type="password" name="senha" placeholder="Senha" required>
                    </div>
                    <button type="submit" class="btn">Registrar</button>
                </form>
            </div>
        </div>
    </body>
</html>