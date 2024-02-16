<?php 
include('conectadb.php');
 
session_start();

if(isset($_SESSION['nomecliente'])){
    $nomecliente = $_SESSION['nomecliente'];
    $idcliente = $_SESSION['idcliente'];
}
else{
    $nomecliente = '';
}
?>

<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<header>
    <div class="container">
        <span class="logo">Saguadim</span>
        <ul class="links">
            <li><a href="menu.php">Início</a></li>
            <li class="dropdown">
                <button><i class="bi bi-person"></i></button>
                <div class="dropdown-content" id="myDropdown">
                    <h1>Olá, <?=$nomecliente?></h1>
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
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
<script src="script.js"></script>
   