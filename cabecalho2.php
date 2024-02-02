<?php
include("conectadb.php");
session_start();
if (isset($_SESSION['emailcliente'])) {
    $emailusuario = $_SESSION['emailcliente'];
    $idusuario = $_SESSION['idusuario'];
}else{
    $emailusuario = "";
}
?>