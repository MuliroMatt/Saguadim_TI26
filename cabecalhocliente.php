<?php 
include('conectadb.php');
 
session_start();

if(isset($_SESSION['nomecliente'])){
    $nomecliente = $_SESSION['nomecliente'];
    $idcliente = $_SESSION['idcliente'];

    $nome = explode(" ", $nomecliente);
    $primeironome = $nome[0];
}
else{
    $nomecliente = '';
}
if($nomecliente == ''){
    echo "<script>window.location.href='logincliente.php';</script>";
}
?>



<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<header class="cliente-header">
    <div class="container">
        <span class="logo">Saguadim</span>
        <ul class="links">
            <li><a href="menu.php">Início</a></li>
            <li class="dropdown">
                <button><i class="bi bi-person"></i></button>
                <div class="dropdown-content" id="myDropdown">
                    <h1>Olá, <?=$primeironome?></h1>
                    <a href="cliente.php">
                        <span class="icon"><i class="bi bi-person-badge"></i></span>
                        <span class="text">Perfil</span>
                    </a>
                    <a href="logoutcliente.php">    
                        <span class="icon"><i class="bi bi-box-arrow-left"></i></span>
                        <span class="text">Sair</span>
                    </a>
                </div>
            </li>       
            
            <li onclick="openNav()"><i class="bi bi-basket3"></i><p>R$ 0,00 <br> 0 Itens</p></li> 
        </ul>
    </div>
</header>
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <?php 
        $sql = "SELECT produtos.pro_nome, item_venda.iv_quantidade, item_venda.iv_total
        FROM produtos
        JOIN item_venda ON produtos.pro_id = item_venda.fk_pro_id
        WHERE cli_id = $idcliente";
        
        $retorno = mysqli_query($link, $sql);

        while ($tbl = mysqli_fetch_array($retorno)){

    ?>
    <div>
        <span><?=$tbl[0]?></span>
        <span><?=$tbl[1]?></span>
        <span><?=$tbl[2]?></span>
    </div>
    <?php 
        }
    ?>
    
    
</div>
<script src="script.js"></script>
   