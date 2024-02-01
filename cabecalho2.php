<?php
include("conectadb.php");
session_start();
isset($_SESSION['nomeusuario'])?$nomeusuario = $_SESSION['nomeusuario']: "";
$nomeusuario = $_SESSION['nomeusuario'];

?>
<link rel="stylesheet" href="./css/style.css">
<header>
        <div class="header-container">
            <div class="logo">
                <h1>Saguadim</h1>
            </div>
            <div class="header-links">
                <ul>
                    <li><a href="">início</a></li>
                    <li><a href="">menu</a></li>
                    <li><a href="">perfil <i class="bi bi-person-circle"></i></a></li>
                </ul>
            </div>
        </div>
    </header>