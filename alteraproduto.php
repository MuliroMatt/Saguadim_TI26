<?php
include("cabecalho.php");

//* Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //* Obtém os dados do formulário 
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $custo = $_POST['custo'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];
    $validade = $_POST['validade'];
    $fornecedor = $_POST['fornecedor'];
    $status = $_POST['status'];

    //* Atualiza os dados no banco de dados
    $sql = "UPDATE produtos SET pro_nome = '$nome', pro_descricao = '$descricao', pro_custo = '$custo', pro_preco = '$preco', 
    pro_quantidade = '$quantidade', pro_validade = '$validade', fk_for_id = '$fornecedor', pro_status = '$status'";

    $sql .= " WHERE pro_id = $id";

    //* Executa a query de atualização no banco de dados
    mysqli_query($link, $sql);

    //* Exibe alerta de sucesso e redireciona para a lista de produtos
    echo "<script>window.alert('Produto alterado com sucesso!');</script>";
    echo "<script>window.location.href='listaproduto.php';</script>";
}

//* Obtém o ID do produto a ser alterado da query string
$id = $_GET['id'];

//* Consulta os dados do produto específico no banco de dados
$sql = "SELECT * FROM produtos WHERE pro_id = '$id'";
$retorno = mysqli_query($link, $sql);

//* Obtém os dados do produto para preencher o formulário
while ($tbl = mysqli_fetch_array($retorno)) {
    $nome = $tbl[1];
    $descricao = $tbl[2];
    $custo = $tbl[3];
    $preco = $tbl[4];
    $quantidade = $tbl[5];
    $validade = $tbl[6];
    $fornecedor = $tbl[7];
    $status = $tbl[8];
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        
        <title>ALTERA PRODUTO</title>
    </head>
    <body>
        <div class="cadastra-container">
            <div class="wrapper">
                <form action="alteraproduto.php" method="post" enctype="multipart/form-data" class="cadastra-form">
                    <input type="hidden" name="id" value="<?=$id ?>">
                    <h3>Produto</h3>
                    <div class="input-box" id="input-box-name">
                        <input type="text" name="nome" id="nome" value="<?=$nome?>" required>
                    </div>
                    <h3>Descrição</h3>
                    <div class="input-box" id="input-box-desc">
                        <!-- <input id ="desc" type="text" name="descricao" id="descricao" placeholder="Descrição"> -->
                        <textarea id="desc" name="descricao" rows="4" cols="50" placeholder="Descrição" required><?=$descricao?></textarea>
                    </div>
                    <h3>Custo</h3>
                    <div class="input-box" id="input-box-preco">
                        <input type="decimal" name="custo" id="custo" value="<?=$custo?>" required>
                    </div>
                    <h3>Custo</h3>
                    <div class="input-box" id="input-box-preco">
                        <input type="decimal" name="preco" id="preco" value="<?=$preco?>" required>
                    </div>
                    <h3>Quantidade</h3>
                    <div class="input-box" id="input-box-qnt">
                        <input type="number" name="quantidade" id="quantidade" value="<?=$quantidade?>" required>
                    </div>
                    <h3>Validade</h3>
                    <div class="input-box" id="input-box-qnt">
                        <input type="date" name="validade" id="validade" required>
                    </div>
                    <h3>Fornecedor</h3>
                    <div class="input-box" id="input-box-cat">
                        <select name="fornecedor" id="fornecedor" required>
                            <?php
                                $sql = "SELECT for_id, for_nome FROM fornecedores";
                                $retorno = mysqli_query($link, $sql);
    
                                while($tbl = mysqli_fetch_array($retorno)){
                            ?>
                                    <option value="<?=$tbl[0]?>"><?=$tbl[1]?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <!-- Verifica se o usuário está ativo ou não -->
                    <h3>Status: <?= $status == 's' ? "Ativo" : "Inativo" ?></h3>
                    <div class="form-container">
                        <input type="radio" name="status" class="radio" value="s" id="radioativo" <?= $status == 's' ? "checked" : "" ?>>
                        <label class="radio-label" for="radioativo">Ativo</label>
                        <input type="radio" name="status" class="radio" value="n" id="radioinativo" <?= $status == 'n' ? "checked" : "" ?>>
                        <label class="radio-label" for="radioinativo">Inativo</label>
                    </div>
                    <button type="submit" class="btn">Alterar</button>
                </form>
            </div>
        </div>
    </body>
</html>
