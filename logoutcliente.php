<?php
    session_start();

    session_destroy();

    header("Location: logincliente.html");
    exit;
?>