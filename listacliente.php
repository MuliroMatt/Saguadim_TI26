<?php
    #ABRE UMA CONEXÃO COM O BANCO DE DADOS
    include("cabecalho.php");

    #PASSANDO UMA INSTRUÇÃO AO BANCO DE DADOS
    $sql = "SELECT * FROM clientes WHERE cli_status = 's'";
    $retorno = mysqli_query($link, $sql);
    $contador = 0; #INICIALIZA UM CONTADOR PARA ACOMPANHAR AS LINHAS

    #FORÇA SEMPRE TRAZER 'S' NA VARIÁVEL PARA UTILIZARMOS NOS RADIO BUTNTON
    $ativo = "s";

    #COLETA O BOTÃO MÉTODO POST VINDO DO HTML
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ativo = $_POST['ativo'];

        #VERIFICA SE O USUARIO ESTÁ ATIVO PARA LISTA, SE 'S' LISTA SENÃO, NÃO LISTA
        if ($ativo == 's') {
            $sql = "SELECT * FROM clientes WHERE cli_status = 's'";
            $retorno = mysqli_query($link, $sql);
        } elseif ($ativo == 'n') {
            $sql = "SELECT * FROM clientes WHERE cli_status = 'n'";
            $retorno = mysqli_query($link, $sql);
        } else {
            $sql = "SELECT * FROM clientes";
            $retorno = mysqli_query($link, $sql);
        }

    }
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <title>LISTA CLIENTES</title>
    </head>
    <body>
        <div class="listausuario-container">
            <main class="table"> 
                <section class="table-header">
                    <h1>Lista de Clientes</h1>
                    <div class="form-container">
                        <form action="listacliente.php" method="post">
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
                </section>
                <section class="table-body">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Cliente</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                                <th>Curso</th>
                                <th>Sala</th>
                                <th>Saldo</th>
                                <th>Status</th>
                                <th>Alterar dados</th>
                            </tr>
                        </thead>
                        <!-- INICIO DE PHP + HTML -->
                        <?php
                        #FAZENDO PREECHIMENTO DE TABELA USANDO WHILE (ENQUANTO TEM DADOS PARA PREENCHER)
                        while ($tbl = mysqli_fetch_array($retorno)) {
                            $contador++; #INCREMENTA O CONTADOR EM CADA ITERAÇÃO
                            #ADICIONA UMA CLASSE ALTERNADA COM BASE NO CONTADOR
                            $classe = ($contador % 2 == 0) ? 'even' : 'odd';
                            #MAS AQUI EU FECHO PARA TRABLHAR COM HTML SIMULTANEAMENTE
                        ?>
                        <tbody>
                            <tr class="<?= $classe ?>">
                                <td><?=$tbl[0] ?></td>
                                <td><?=$tbl[1] ?></td> 
                                <td><?=$tbl[2] ?></td>
                                <td><?=$tbl[3] ?></td>
                                <td><?=$tbl[4] ?></td>
                                <td><?=$tbl[5] ?></td>
                                <td><?=$tbl[6] ?></td>
                                <td><?=$tbl[8] ?></td>
                                <td>
                                    <p class="status <?= $check = ($tbl[7] == "s") ? "ativo" : "inativo" ?>">
                                        <?= $check = ($tbl[7] == "s") ? "Ativo" : "Inativo" ?>
                                    </p>
                                </td>
                                <td><a href="alteracliente.php?id=<?=$tbl[0] ?>"><button class="btn-alterar"><p class="text">Alterar</p></button></a></td>
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