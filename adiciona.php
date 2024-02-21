<?php 

include("conectadb.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $quantidade = $_POST['quantidade'];
    $id = $_POST['id-produto'];
    $total = $_POST['btn'];
    $codigo = rand(10000, 99999);
    echo 'qtd ' .$quantidade;
    echo'<br>';
    echo 'id '.$id;
    echo'<br>';
    echo "total " . $total;
    echo'<br>';
    echo "codigo" . $codigo;
    
    $sql = "INSERT INTO item_venda (iv_quantidade, iv_total, iv_codigo, fk_pro_id)
            VALUES ('$quantidade', '$total', '$codigo', '$id')";
    mysqli_query($link, $sql);

    $datavenda = date('Y-m-d');
    $idcliente = $_SESSION['idcliente'];
    echo '<br> idcliente'. $idcliente;

    $sql = "INSERT INTO vendas (ven_data, fk_cli_id, ven_total, fk_ven_codigo)
            VALUES ('$datavenda', '$idcliente',)";
    // echo "<script>window.location.href='menu.php';</script>";
}


?>