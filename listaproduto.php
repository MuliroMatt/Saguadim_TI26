<?php
    //*ABRE UMA CONEXÃO COM O BANCO DE DADOS
    include("cabecalho.php");

    //*PASSANDO UMA INSTRUÇÃO AO BANCO DE DADOS
    $sql = "SELECT * FROM produtos WHERE pro_status = 's'";
    $retorno = mysqli_query($link, $sql);
    $contador = 0;

    //*FORÇA SEMPRE TRAZER 'S' NA VARIÁVEL PARA UTILIZARMOS NOS RADIO BUTTON
    $ativo = "s";

    //*COLETA O BOTÃO MÉTODO POST VINDO DO HTML
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ativo = $_POST['ativo'];

        //*VERIFICA SE O USUARIO ESTÁ ATIVO PARA LISTA, SE 'S' LISTA SENÃO, NÃO LISTA
        if ($ativo == 's') {
            $sql = "SELECT * FROM produtos WHERE pro_status = 's'";
            $retorno = mysqli_query($link, $sql);
        }
        elseif ($ativo == 'n') { 
            $sql = "SELECT * FROM produtos WHERE pro_status = 'n'";
            $retorno = mysqli_query($link, $sql);
        } 
        elseif ($ativo == 'todos') { 
            $sql = "SELECT * FROM produtos";
            $retorno = mysqli_query($link, $sql);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <title>LISTA PRODUTOS</title>
    </head>
    <body>
        <div class="lista-container">
            <main class="table"> 
                <section class="table-header">
                    <h1>Lista de Produtos</h1>
                    <div class="form-container">
                        <form action="listaproduto.php" method="post">
                            <input type="radio" name="ativo" class="radio" value="s" id="radioativo"
                            required onclick="submit()" <?= $ativo == 's' ? "checked" : "" ?>>
                            <label class="radio-label" for="radioativo">Ativo</label>
                            <input type="radio" name="ativo" class="radio" value="n" id="radioinativo"
                            required onclick="submit()" <?= $ativo == 'n' ? "checked" : "" ?>>
                            <label class="radio-label" for="radioinativo">Inativo</label>
                            <input type="radio" name="ativo" class="radio" value="todos" id="radiotodos"
                            required onclick="submit()" <?= $ativo == 'todos' ? "checked" : "" ?>>
                            <label class="radio-label" for="radiotodos">Todos</label>
                        </form>
                    </div>
                    <a href="cadastraproduto.php" class="btn-cadastrar">Cadastrar novo produto</a>
                </section>
                <section class="table-body">
                    <table>
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Descrição</th>
                                <th>Custo</th>
                                <th>Preço</th>
                                <th>Quantidade em Estoque</th>
                                <th>Validade</th>
                                <th>Status</th>
                                <th>Alterar Dados</th>
                            </tr>
                        </thead>
                        <!-- INICIO DE PHP + HTML -->
                        <?php
                        //*FAZENDO PREENCHIMENTO DE TABELA USANDO WHILE (ENQUANTO TEM DADOS PARA PREENCHER)
                        while ($tbl = mysqli_fetch_array($retorno)) {
                            $contador++;
                            $classe = ($contador % 2 == 0) ? 'even' : 'odd';
                            ?>
                            <tbody>
                                <tr class="<?= $classe ?>">
                                    <td id="pro"><?= $tbl[1] ?></td> <!--PRODUTO-->
                                    <td id="desc">
                                        <?php
                                        $descricao = substr($tbl[2], 0, 100);
                                        echo $descricao;
                                        if (strlen($tbl[2]) > 100) {
                                            echo '...<a href="lermais.php">mais</a>';
                                        }
                                        ?>
                                    </td> <!--DESCRIÇÃO-->
                                    <td id="custo"><strong>R$ <?= $tbl[3] ?> <strong></td> 
                                    <td id="preco"><strong>R$ <?= $tbl[4] ?></strong></td> <!--PREÇO-->
                                    <?php
                                    if($tbl[5] > 0){
                                    ?>
                                    <td id="quant"><strong><?= $tbl[5] ?></strong></td> <!--QUANTIDADE-->
                                    <?php
                                    } else{
                                    ?>
                                        <td id="esgotado"><p>Esgotado</p></td>
                                    <?php
                                    }
                                    ?>
                                    <td id="validade"><?=$tbl[6]?></td>
                                    <td id="status">
                                        <p class="status <?= $check = ($tbl[8] == "s") ? "ativo" : "inativo" ?>">
                                            <?= $check = ($tbl[8] == "s") ? "Ativo" : "Inativo" ?>
                                        </p>
                                    </td>
                                    <td id="alt"><a href="alteraproduto.php?id=<?= $tbl[0] ?>"><button class="btn-alterar"><p class="text">Alterar</p></button></a></td>
                                </tr>
                            </tbody>
                            <?php
                        }
                        ?>
                    </table>
                </section>
            </main>
        </div>
    </body>
</html>

