
<?php
include("cabecalho.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $curso = $_POST['curso'];
    $sala = $_POST['sala'];
    $senha = $_POST['senha'];

    //*INSERIR INSTRUÇÕES NO BANCO  
    $sql = "SELECT COUNT(cli_id) FROM clientes WHERE cli_email = '$email' OR cli_nome = '$nome'";
    $resultado = mysqli_query($link, $sql);
    $resultado = mysqli_fetch_array($resultado) [0];
    //*GRAVA LOG  
    $sql = '"'.$sql.'"';
    $sqllog = "INSERT INTO tab_log (tab_query, tab_data) VALUES ($sql, NOW())";
    mysqli_query($link, $sqllog);
    //*VERIFICA SE EXISTE
    if($resultado >= 1){
        echo"<script>window.alert('CLIENTE JÁ CADASTRADO');</script>";
        echo"<script>window.location.href='cadastracliente.php';</script>";
    }
    else{
        $sql = "INSERT INTO clientes(cli_nome, cli_email, cli_telefone, cli_cpf, cli_curso, cli_sala, cli_status, cli_senha) 
                VALUES('$nome','$email','$telefone','$cpf','$curso','$sala', 's', $senha)";
        mysqli_query($link, $sql);

         //*GRAVA LOG
        $sql ='"'.$sql.'"';
        $sqllog ="INSERT INTO tab_log (tab_query, tab_data) VALUES ($sql, NOW())";
        mysqli_query($link, $sqllog);

        echo"<script>window.alert('CLIENTE CADASTRADO');</script>";
        echo"<script>window.location.href='listacliente.php';</script>";
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
        <title>CADASTRO DE CLIENTE</title>
    </head>
    <body>
        <div class="cadastra-container cliente">
            <div class="wrapper">
                <form action="cadastraclienteadmin.php" method="post" class="cadastra-form">
                    <h1>Registrar Cliente</h1>
                    <div class="input-box" id="input-box-name">
                        <input id="login-name" type="text" name="nome" placeholder="Nome">
                    </div>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="number" name="telefone" placeholder="(00) 0000-0000">
                    </div>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="text" name="cpf" placeholder="000-000-000-00">
                    </div>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="text" name="curso" placeholder="Curso">
                    </div>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="text" name="sala" placeholder="Sala">
                    </div>
                    <div class="input-box" id="input-box-email">
                        <input id="login-email" type="password" name="senha" placeholder="Senha">
                    </div>
                    
                    <button type="submit" class="btn">Registrar</button>
                </form>
            </div>
        </div>
    </body>
</html>