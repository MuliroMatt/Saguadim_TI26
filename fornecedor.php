<?php
include('cabecalho.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];

     //*QUERY DE VALIDA SE USUÁRIO EXISTE
    $sql = "SELECT COUNT(for_id) FROM fornecedores WHERE for_nome = '$nome'";
    $retorno = mysqli_query($link, $sql);

     //*SUGESTÃO ARIEL DE SANITIZAÇÃO
    $retorno = mysqli_fetch_array($retorno)[0];
    if($retorno == 0){
        $sql = "INSERT INTO fornecedores (for_nome) VALUES('$nome')";
        mysqli_query($link, $sql);
        echo"<script>window.alert('FORNECEDOR CADASTRADO COM SUCESSO');
        window.location.href='backoffice.php';</script>;";
    } else{
        echo"<script>window.alert('FORNECEDOR JÁ CADASTRADO');</script>;";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>FORNECEDOR</title>
</head>
<body>
    <div class="cadastrausuario-container">
        <div class="wrapper">
            <form action="fornecedor.php" method="post">
                <div class="input-box">
                    <input type="text" name="nome" placeholder="Nome Fornecedor">
                </div>
                <button type="submit" class="btn">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>