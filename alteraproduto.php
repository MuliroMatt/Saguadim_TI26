<?php
include("conectadb.php");

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $custo = $_POST['custo'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $validade = $_POST['validade'];
    // $fornecedor_id = $_POST['fornecedor'];

    $sql = "SELECT COUNT(pro_id) FROM produtos WHERE pro_nome = '$nome'";
    $retorno = mysqli_query($link, $sql);
    $cont = (mysqli_fetch_array($retorno)[0]);

    if($cont == 0){
        // $sql = " produtos(pro_nome, pro_descricao, pro_custo, pro_preco, pro_quantidade, pro_validade, fk_for_id, pro_status)
        // VALUES('$nome', '$descricao', $custo, $preco, $quantidade, '$validade', $fornecedor_id, 's')";
        $sql = "UPDATE produtos SET pro_nome = '$nome', pro_descricao = '$descricao', pro_custo = $custo, pro_preco = $preco,
        pro_quantidade = $quantidade, pro_validade = $validade";

        mysqli_query($link, $sql);
        echo"<script>window.alert('PRODUTO CADASTRADO COM SUCESSO');</script>";
        echo"<script>window.location.href='listaproduto.php';</script>";
    }else {
        echo"<script>window.alert('PRODUTO JÁ EXISTENTE');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>ALTERA PRODUTO</title>
</head>
<body>
<div class="cadastraproduto-container">
            <div class="wrapper">
                <form action="alteraproduto.php" method="post" enctype="multipart/form-data">
                    <h3>Produto</h3>
                    <div class="input-box" id="input-box-name">
                        <input type="text" name="nome" id="nome" placeholder="Nome do Produto">
                    </div>
                    <h3>Descrição</h3>
                    <div class="input-box" id="input-box-desc">
                        <textarea id="desc" name="descricao" rows="4" cols="50" placeholder="Descrição"></textarea>
                    </div>
                    <h3>Quantidade</h3>
                    <div class="input-box" id="input-box-qnt">
                        <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade">
                    </div>
                    <h3>Custo</h3>
                    <div class="input-box" id="input-box-custo">
                        <input type="decimal" name="custo" id="custo" placeholder="R$">
                    </div>
                    <h3>Preço</h3>
                    <div class="input-box" id="input-box-preco">
                        <input type="decimal" name="preco" id="preco" placeholder="R$">
                    </div>
                    <h3>Validade</h3>
                    <div class="input-box" id="input-box-validade">
                        <input type="date" name="validade" id="validade">
                    </div>
                    
                    <button type="submit" class="btn">Cadastrar</button>
                </form>
            </div>
        </div>
</body>
</html>

