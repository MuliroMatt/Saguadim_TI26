<?php
    #ABRE UMA CONEXÃO COM O BANCO DE DADOS
    include("cabecalho.php");

    #PASSANDO UMA INSTRUÇÃO AO BANCO DE DADOS
    $sql = "SELECT * FROM fornecedores";
    $retorno = mysqli_query($link, $sql);
    $contador = 0;
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
    <div class="lista-container">
        <main class="table"> 
            <section class="table-header">
                <h1>Lista de Produtos</h1>
                <a href="cadastrafornecedor.php" class="btn-cadastrar">Cadastrar novo fornecedor</a>
            </section>
            <section class="table-body">
                <table>
                    <thead>
                        <tr>
                            <th>Fornecedor</th>
                        </tr>
                    </thead>
                    <!-- INICIO DE PHP + HTML -->
                    <?php
                    #FAZENDO PREENCHIMENTO DE TABELA USANDO WHILE (ENQUANTO TEM DADOS PARA PREENCHER)
                    while ($tbl = mysqli_fetch_array($retorno)) {
                        $contador++;
                        $classe = ($contador % 2 == 0) ? 'even' : 'odd';
                        ?>
                        <tbody>
                            <tr class="<?= $classe ?>">
                                <td id="for"><?= $tbl[1] ?></td> <!--PRODUTO-->
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