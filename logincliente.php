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
    $sql = "SELECT COUNT(cli_id) FROM clientes WHERE cli_email = '$email' AND cli_senha = '$senha' AND cli_status = 's'";
    $retorno = mysqli_query($link, $sql);

    //*SUGESTÃO ARIEL DE SANITIZAÇÃO
    $retorno = mysqli_fetch_array($retorno)[0];
    
    //*GRAVA LOG  
    $sql = '"'.$sql.'"';
    $sqllog = "INSERT INTO tab_log (tab_query, tab_data) VALUES ($sql, NOW())";
    mysqli_query($link, $sqllog);

    //*SE USUÁRIO NÃO EXISTE LOGA, SE NÃO, NÃO LOGA
    if($retorno == 0){
        echo"<script>window.alert('USUÁRIO INCORRETO OU SENHA INCORRETO');</script>";
        echo"<script>window.location.href='logincliente.html';</script>";

    }
    else{
        $sql = "SELECT * FROM clientes WHERE cli_email = '$email' AND cli_senha = '$senha' AND cli_status = 's'";
        $retorno = mysqli_query($link, $sql);

        //*GRAVA LOG
        $sql = '"'.$sql.'"';
        $sqllog = "INSERT INTO tab_log (tab_query, tab_data) VALUES ($sql, NOW())";
        mysqli_query($link, $sqllog);
        while($tbl = mysqli_fetch_array($retorno)){
            $_SESSION['idusuario'] = $tbl[0];
            $_SESSION['nomeusuario'] = $tbl[1];
        }
        echo"<script>window.location.href='cliente.php';</script>";
    }
}

?>