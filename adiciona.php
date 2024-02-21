<?php 

include("conectadb.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $quantidade = $_POST['quantidade'];
    $id = $_POST['id-produto'];
    $idcliente = $_SESSION['idcliente'];
    $total = $_POST['btn'];
    echo 'qtd ' .$quantidade;
    echo'<br>';
    echo 'id '.$id;
    echo'<br>';
    echo "total " . $total;
    echo'<br>';
    echo "idcliente " . $idcliente;
    
    $sql = "INSERT INTO item_venda (iv_quantidade, iv_total, fk_pro_id, fk_cli_id)
            VALUES ('$quantidade', '$total', '$id', '$idcliente')";
    mysqli_query($link, $sql);
    echo "<script>window.location.href='menu.php';</script>";

}


?>