<?php
include("conectadb.php");
session_start();
isset($_SESSION['nomeusuario'])?$nomeusuario = $_SESSION['nomeusuario']: "";
$nomeusuario = $_SESSION['nomeusuario'];

?>
<link rel="stylesheet" href="./css/style.css">
<nav>
    <div class="nav-container">
        <div class="logo-admin">
            <h1>Saguadim</h1>
            <p>Admin</p>
        </div>
        <ul class="nav-list">
            <li><a href="listausuario.php">Usuários</a></li>
            <!-- <li><a href="cadastrausuario.php">Cadastrar usuário</a></li> -->
            <li><a href="listaproduto.php">Produtos</a></li>
            <!-- <li><a href="cadastraproduto.php">Cadastrar produto</a></li> -->
            <li><a href="listacliente.php">Clientes</a></li>
            <!-- <li><a href="cadastracliente.php">Cadastrar cliente</a></li> -->
            <li><a href="encomendas.php">Encomendas</a></li>
            <li><a href="fornecedor.php">Fornecedor</a></li>
        </ul>
        <ul class="user-info">
            <!--VALIDA SE SESSÃO DE USUARIO ESTÁ AUTENTICADA, SENÃO, RETORNA PARA LOGIN -->
            <?php
            if($nomeusuario != null) {
                ?>
            <li><p>Olá <?= $nomeusuario ?></p></li>
            <?php
            } else {
                echo "<script>window.alert('USUÁRIO NÃO AUTENTICADO');
                window.location.href='login.php';</script>";
            }
            ?>
            <li id="btn-sair"><a href="logout.php">Sair</a></li>
        </ul>
    </div>
</nav>