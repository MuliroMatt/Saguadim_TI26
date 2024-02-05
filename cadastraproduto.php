<?php
//* Inclui o cabeçalho comum a várias páginas
include("cabecalho.php");

//* Verifica se a requisição é do tipo POST
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    //* Obtém os dados do formulário enviado via POST
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $custo = $_POST['custo'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $validade = $_POST['validade'];
    $fornecedor_id = $_POST['fornecedor'];

    //* Verifica se o produto já existe no banco de dados
    $sql = "SELECT COUNT(pro_id) FROM produtos WHERE pro_nome = '$nome'";
    $retorno = mysqli_query($link, $sql);
    $cont = (mysqli_fetch_array($retorno)[0]);

    //* Se o produto não existir, realiza o cadastro
    if($cont == 0){
        $sql = "INSERT INTO produtos(pro_nome, pro_descricao, pro_custo, pro_preco, pro_quantidade, pro_validade, fk_for_id, pro_status)
        VALUES('$nome', '$descricao', $custo, $preco, $quantidade, '$validade', $fornecedor_id, 's')";
        mysqli_query($link, $sql);

        //* Exibe alerta de sucesso e redireciona para a lista de produtos
        echo"<script>window.alert('PRODUTO CADASTRADO COM SUCESSO');</script>";
        echo"<script>window.location.href='listaproduto.php';</script>";
    }else {
        //* Exibe alerta informando que o produto já existe
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
    <title>CADASTRA PRODUTO</title>
</head>
<body>
<div class="cadastra-container">
            <div class="wrapper">
                <form action="cadastraproduto.php" method="post" enctype="multipart/form-data" class="cadastra-form">
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
                    <h3>Fornecedor</h3>
                    <div class="input-box" id="input-box-cat">
                        <select name="fornecedor" id="fornecedor" required>
                        <?php
                            //* Consulta SQL para obter os registros da tabela 'fornecedores'
                            $sql = "SELECT for_id, for_nome FROM fornecedores";
                            
                            //* Executa a consulta e obtém o resultado
                            $retorno = mysqli_query($link, $sql);

                            //* Itera sobre os registros retornados e cria opções para o elemento select
                            while($tbl = mysqli_fetch_array($retorno)){
                        ?>
                            <option value="<?=$tbl[0]?>"><?=$tbl[1]?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    <button type="submit" class="btn">Cadastrar</button>
                </form>
            </div>
        </div>
</body>
</html>

