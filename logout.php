<?php
    session_start();

    session_destroy();

    header("Location: loginadmin.html");
    exit;
?>