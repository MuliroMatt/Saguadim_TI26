<?php
    session_start();

    session_destroy();

    header("Location: cliente.php");
    exit;
?>