<?php
    session_start();
    unset($_SESSION['id']);
    unset( $_SESSION['name']);
    unset($_SESSION['password']);
    header("location:../login/index.php");
    die();
?>