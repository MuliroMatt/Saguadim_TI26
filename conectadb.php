<?php
    #LOCALIZA PC COM BANCO(NOME DO COMPUTADOR)
    $servidor = "localhost";
    #NOMDE DO BANCO
    $banco = "saguadim";
    #USUARIO DE ACESSO
    $usuario = "root";
    #SENHA DO USUARIO
    $senha = "123";
    #LINK DE ACESSO
    $link = mysqli_connect($servidor, $usuario, $senha, $banco);
?>